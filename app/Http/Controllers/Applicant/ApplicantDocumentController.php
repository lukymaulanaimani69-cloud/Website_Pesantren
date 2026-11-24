<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Registration;
use App\Models\RegistrationDocument;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApplicantDocumentController extends Controller
{
    public function upload(Request $request): RedirectResponse
    {
        $userId = auth()->id();
        $registration = Registration::where('user_id', $userId)->latest()->first();

        if (! $registration) {
            return back()->with('error', 'Silakan simpan draf formulir terlebih dahulu sebelum mengunggah berkas.');
        }

        if (! $registration->status->canApplicantEdit()) {
            return back()->with('error', 'Dokumen tidak dapat diubah karena status pendaftaran saat ini sedang diproses.');
        }

        $validated = $request->validate([
            'document_type' => ['required', 'in:kartu_keluarga,akta_kelahiran,ijazah_or_rapor,pas_foto'],
            'file' => ['required', 'file', 'mimes:pdf,jpeg,png,jpg', 'max:10240'], // 10MB limit
        ], [
            'document_type.required' => 'Jenis berkas wajib dipilih.',
            'file.required' => 'Silakan pilih berkas yang akan diunggah.',
            'file.mimes' => 'Format berkas hanya diperbolehkan PDF, JPEG, JPG, atau PNG.',
            'file.max' => 'Ukuran berkas maksimal 10 MB.',
        ]);

        $file = $request->file('file');
        $randomFileName = Str::random(40) . '.' . $file->getClientOriginalExtension();

        // Stored strictly on the private disk
        $path = $file->storeAs('registrations/' . $registration->id, $randomFileName, 'private');

        // Check if document of this type already exists, if so delete old file
        $existing = RegistrationDocument::where('registration_id', $registration->id)
            ->where('document_type', $validated['document_type'])
            ->first();

        if ($existing) {
            Storage::disk('private')->delete($existing->path);
            $existing->delete();
        }

        $doc = RegistrationDocument::create([
            'registration_id' => $registration->id,
            'document_type' => $validated['document_type'],
            'disk' => 'private',
            'path' => $path,
            'original_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType() ?: 'application/octet-stream',
            'size_bytes' => $file->getSize(),
            'uploaded_at' => now(),
        ]);

        AuditLog::record('upload_registration_document', $registration, [
            'document_type' => $doc->document_type,
            'filename' => $doc->original_name,
        ]);

        return back()->with('success', 'Berkas ' . $doc->document_type_label . ' berhasil diunggah secara aman.');
    }

    public function delete(RegistrationDocument $document): RedirectResponse
    {
        if (! Gate::allows('delete', $document)) {
            abort(403, 'Anda tidak diizinkan menghapus dokumen ini.');
        }

        Storage::disk('private')->delete($document->path);
        $document->delete();

        return back()->with('success', 'Dokumen berhasil dihapus.');
    }
}
