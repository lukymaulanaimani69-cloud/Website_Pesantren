<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function showRegistrationForm(): View
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini telah terdaftar. Silakan login atau gunakan email lain.',
            'phone.required' => 'Nomor WhatsApp / HP wajib diisi.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'role' => UserRole::APPLICANT, // Strictly applicant
            'is_active' => true,
            'password' => Hash::make($validated['password']),
        ]);

        AuditLog::record('register_applicant', $user, [
            'email' => $user->email,
            'name' => $user->name,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('applicant.dashboard')
            ->with('success', 'Akun pendaftar berhasil dibuat. Selamat datang di Portal PSB Pondok Pesantren Damanhuri Romly.');
    }
}
