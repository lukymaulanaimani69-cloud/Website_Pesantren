<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ContactController extends Controller
{
        public function show(): View
    {
        return view('public.kontak.index');
    }


    public function index(): View
    {
        // Backward compatibility – delegate to show()
        return $this->show();
    }


    public function submit(Request $request): RedirectResponse
    {
        $throttleKey = 'contact_form|'.$request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            throw ValidationException::withMessages([
                'message' => "Terlalu banyak pesan terkirim. Mohon menunggu {$seconds} detik sebelum mengirim kembali.",
            ]);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:3000'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'contact.required' => 'Nomor HP/Email wajib diisi.',
            'subject.required' => 'Subjek pesan wajib diisi.',
            'message.required' => 'Isi pesan wajib diisi.',
            'message.max' => 'Pesan terlalu panjang (maksimal 3000 karakter).',
        ]);

        RateLimiter::hit($throttleKey, 600); // 10 minutes window

        ContactMessage::create([
            'name' => $validated['name'],
            'contact' => $validated['contact'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'status' => 'unread',
        ]);

        return redirect()->route('kontak.index')
            ->with('success', 'Terima kasih, pesan Anda telah berhasil dikirimkan ke sekretariat kami.');
    }
}
