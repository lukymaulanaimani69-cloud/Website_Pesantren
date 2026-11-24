<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\RegistrationDocument;
use App\Models\RegistrationPeriod;
use Illuminate\View\View;

class ApplicantDashboardController extends Controller
{
    public function index(): View
    {
        $userId = auth()->id();

        // Strict server-side scoping to authenticated user only
        $registration = Registration::with(['period', 'documents', 'histories.actor'])
            ->where('user_id', $userId)
            ->latest()
            ->first();

        $activePeriod = RegistrationPeriod::currentActive();

        $requiredDocumentTypes = [
            'kartu_keluarga' => 'Kartu Keluarga (KK)',
            'akta_kelahiran' => 'Akta Kelahiran',
            'ijazah_or_rapor' => 'Ijazah / Rapor Terakhir',
            'pas_foto' => 'Pas Foto Santri',
        ];

        $uploadedDocTypes = $registration
            ? $registration->documents->pluck('document_type')->toArray()
            : [];

        return view('applicant.dashboard', compact(
            'registration',
            'activePeriod',
            'requiredDocumentTypes',
            'uploadedDocTypes'
        ));
    }
}
