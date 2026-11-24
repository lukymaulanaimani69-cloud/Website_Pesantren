<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RegistrationStatus;
use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Registration;
use App\Models\RegistrationPeriod;
use App\Models\RegistrationStatusHistory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PsbReviewController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->query('status');
        $periodId = $request->query('periode');
        $search = $request->query('cari');

        $query = Registration::with(['user', 'period'])->latest();

        if ($status) {
            $query->where('status', $status);
        }

        if ($periodId) {
            $query->where('registration_period_id', $periodId);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('student_name', 'LIKE', "%{$search}%")
                  ->orWhere('registration_number', 'LIKE', "%{$search}%")
                  ->orWhere('guardian_name', 'LIKE', "%{$search}%");
            });
        }

        $registrations = $query->paginate(15)->withQueryString();
        $periods = RegistrationPeriod::all();
        $statuses = RegistrationStatus::cases();

        return view('admin.psb.index', compact('registrations', 'periods', 'statuses', 'status', 'periodId', 'search'));
    }

    public function show(Registration $registration): View
    {
        $registration->load(['user', 'period', 'documents', 'histories.actor']);

        return view('admin.psb.show', compact('registration'));
    }

    public function updateStatus(Request $request, Registration $registration): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:' . implode(',', [
                RegistrationStatus::NEEDS_REVISION->value,
                RegistrationStatus::VERIFIED->value,
                RegistrationStatus::ACCEPTED->value,
                RegistrationStatus::REJECTED->value,
            ])],
            'note' => ['required', 'string', 'max:1000'],
        ], [
            'status.required' => 'Keputusan status wajib dipilih.',
            'note.required' => 'Catatan / alasan keputusan wajib dicantumkan demi transparansi verifikasi.',
        ]);

        $fromStatus = $registration->status->value;
        $toStatus = $validated['status'];

        DB::transaction(function () use ($registration, $fromStatus, $toStatus, $validated) {
            $registration->status = $toStatus;

            if ($toStatus === RegistrationStatus::VERIFIED->value) {
                $registration->verified_at = now();
            }

            if (in_array($toStatus, [RegistrationStatus::ACCEPTED->value, RegistrationStatus::REJECTED->value], true)) {
                $registration->decided_at = now();
            }

            $registration->admin_notes = $validated['note'];
            $registration->save();

            // Record status history
            RegistrationStatusHistory::create([
                'registration_id' => $registration->id,
                'actor_id' => auth()->id(),
                'from_status' => $fromStatus,
                'to_status' => $toStatus,
                'note' => $validated['note'],
                'created_at' => now(),
            ]);

            // Audit log
            AuditLog::record('review_registration', $registration, [
                'registration_number' => $registration->registration_number,
                'from_status' => $fromStatus,
                'to_status' => $toStatus,
                'note' => $validated['note'],
            ]);
        });

        return redirect()->route('admin.psb.show', $registration)
            ->with('success', 'Status pendaftaran berhasil diperbarui dan dicatat dalam riwayat seleksi.');
    }
}
