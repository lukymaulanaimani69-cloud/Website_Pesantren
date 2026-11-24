<?php

namespace App\Http\Controllers;

use App\Models\RegistrationDocument;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class RegistrationDocumentDownloadController extends Controller
{
    public function download(RegistrationDocument $document): StreamedResponse
    {
        // Must authorize against Policy
        if (! Gate::allows('download', $document)) {
            abort(403, 'Akses dokumen privat ditolak.');
        }

        $disk = Storage::disk($document->disk ?: 'private');

        if (! $disk->exists($document->path)) {
            abort(404, 'Berkas dokumen tidak ditemukan di media penyimpanan aman.');
        }

        return $disk->download($document->path, $document->original_name, [
            'Content-Type' => $document->mime_type ?: 'application/octet-stream',
            'X-Content-Type-Options' => 'nosniff',
        ]);
    }
}
