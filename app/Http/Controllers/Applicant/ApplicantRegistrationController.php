<?php

namespace App\Http\Controllers\Applicant;

use App\Enums\RegistrationStatus;
use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Program;
use App\Models\Registration;
use App\Models\RegistrationPeriod;
use App\Models\RegistrationStatusHistory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ApplicantRegistrationController extends Controller
{
    public function showForm(): View
    {
        $userId = auth()->id();
        $registration = Registration::with('documents')->where('user_id', $userId)->latest()->first();
        $activePeriod = RegistrationPeriod::currentActive();
        $programs = Program::published()->get();

        return view('applicant.registration.form', compact('registration', 'activePeriod', 'programs'));
    }

    public function saveDraft(Request $request): RedirectResponse
    {
        $activePeriod = RegistrationPeriod::currentActive();

        if (! $activePeriod) {
            return back()->with('error', 'Pendaftaran tidak dapat disimpan karena tidak ada periode PSB yang sedang aktif.');
        }

        $userId = auth()->id();
        $registration = Registration::where('user_id', $userId)->latest()->first();

        if ($registration && ! $registration->status->canApplicantEdit()) {
            return back()->with('error', 'Formulir Anda telah terkirim dan tidak dapat diubah kecuali petugas meminta revisi.');
        }

        $validated = $request->validate([
            'student_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:L,P'],
            'birth_place' => ['nullable', 'string', 'max:100'],
            'birth_date' => ['nullable', 'date'],
            'previous_school' => ['nullable', 'string', 'max:255'],
            'guardian_name' => ['required', 'string', 'max:255'],
            'guardian_relation' => ['nullable', 'string', 'max:50'],
            'guardian_contact' => ['required', 'string', 'max:50'],
            'address' => ['nullable', 'string'],
            'chosen_program' => ['nullable', 'string', 'max:150'],
            'notes' => ['nullable', 'string'],
        ], [
            'student_name.required' => 'Nama lengkap calon santri wajib diisi.',
            'gender.required' => 'Jenis kelamin calon santri wajib dipilih.',
            'guardian_name.required' => 'Nama orang tua / wali wajib diisi.',
            'guardian_contact.required' => 'Kontak orang tua / wali wajib diisi.',
        ]);

        if (! $registration) {
            $registration = new Registration();
            $registration->user_id = $userId; // Strictly server authenticated ID
            $registration->registration_period_id = $activePeriod->id;
            $registration->status = RegistrationStatus::DRAFT;
        }

        $registration->student_name = $validated['student_name'];
        $registration->gender = $validated['gender'];
        $registration->birth_place = $validated['birth_place'];
        $registration->birth_date = $validated['birth_date'];
        $registration->previous_school = $validated['previous_school'];
        $registration->guardian_name = $validated['guardian_name'];
        $registration->guardian_relation = $validated['guardian_relation'];
        $registration->guardian_contact = $validated['guardian_contact'];
        $registration->address = $validated['address'];
        $registration->chosen_program = $validated['chosen_program'];
        $registration->notes = $validated['notes'];
        $registration->save();

        return redirect()->route('applicant.dashboard')
            ->with('success', 'Draf pendaftaran Anda berhasil disimpan. Anda dapat melengkapi berkas sebelum mengirimkan pendaftaran.');
    }

    public function store(Request $request): RedirectResponse
    {
        // Compatibility wrapper – delegate to submit()
        return $this->submit($request);
    }

    public function submit(Request $request): RedirectResponse
    {
        $userId = auth()->id();
        $registration = Registration::with('documents')->where('user_id', $userId)->latest()->first();

        if (! $registration) {
            return redirect()->route('applicant.registration.form')
                ->with('error', 'Silakan lengkapi formulir pendaftaran terlebih dahulu.');
        }

        // Check Policy
        if (! Gate::allows('submit', $registration)) {
            abort(403, 'Anda tidak memiliki hak untuk mengirimkan pengajuan ini.');
        }

        // Verify required fields
        $validated = $request->validate([
            'student_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:L,P'],
            'birth_place' => ['required', 'string', 'max:100'],
            'birth_date' => ['required', 'date'],
            'guardian_name' => ['required', 'string', 'max:255'],
            'guardian_contact' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string'],
            'chosen_program' => ['required', 'string'],
        ], [
            'birth_place.required' => 'Tempat lahir calon santri wajib diisi sebelum mengirim pendaftaran.',
            'birth_date.required' => 'Tanggal lahir calon santri wajib diisi sebelum mengirim pendaftaran.',
            'address.required' => 'Alamat lengkap tempat tinggal wajib diisi sebelum mengirim pendaftaran.',
            'chosen_program.required' => 'Program pendidikan pilihan wajib dipilih.',
        ]);

        // Check required documents
        $uploadedDocTypes = $registration->documents->pluck('document_type')->toArray();
        $requiredDocs = ['kartu_keluarga', 'akta_kelahiran', 'pas_foto'];
        $missing = array_diff($requiredDocs, $uploadedDocTypes);

        if (! empty($missing)) {
            return back()->with('error', 'Pengajuan belum dapat dikirimkan karena berkas wajib (KK, Akta Kelahiran, dan Pas Foto) belum lengkap.');
        }

        $fromStatus = $registration->status->value;

        DB::transaction(function () use ($registration, $fromStatus, $validated) {
            $registration->fill($validated);

            if (! $registration->registration_number) {
                $registration->registration_number = $registration->generateUniqueRegistrationNumber();
            }

            $registration->status = RegistrationStatus::SUBMITTED;
            $registration->submitted_at = now();
            $registration->save();

            RegistrationStatusHistory::create([
                'registration_id' => $registration->id,
                'actor_id' => auth()->id(),
                'from_status' => $fromStatus,
                'to_status' => RegistrationStatus::SUBMITTED->value,
                'note' => 'Pengajuan pendaftaran resmi dikirimkan oleh pemohon.',
                'created_at' => now(),
            ]);

            AuditLog::record('submit_registration', $registration, [
                'registration_number' => $registration->registration_number,
            ]);
        });

        return redirect()->route('applicant.dashboard')
            ->with('success', 'Alhamdulillah! Pendaftaran Anda dengan nomor ' . $registration->registration_number . ' telah berhasil dikirimkan. Panitia akan memeriksa berkas Anda.');
    }
}
