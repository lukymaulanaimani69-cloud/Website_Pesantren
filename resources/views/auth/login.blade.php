@extends('layouts.public')

@section('title', 'Masuk Akun')

@section('content')
<div class="py-12 sm:py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto">
        <div class="bg-white rounded-2xl shadow-xl border border-stone-200/80 p-8 sm:p-10">
            <div class="text-center mb-8">
                <img src="{{ asset('images/LOGO_PDR-removebg-preview.png') }}" alt="Logo Pondok Pesantren Damanhuri Romly" class="w-14 h-14 rounded-2xl object-contain shadow-md border border-[#C6A55C]/40 mb-3">
                <h1 class="text-2xl font-bold text-[#14532D]">Masuk ke Sistem</h1>
                <p class="text-sm text-stone-500 mt-1">Silakan masukkan email dan kata sandi Anda</p>
            </div>

            <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Alamat Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52] focus:border-transparent transition"
                        placeholder="nama@email.com">
                    @error('email')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1">
                        <label for="password" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider">Kata Sandi</label>
                    </div>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52] focus:border-transparent transition"
                        placeholder="••••••••">
                    @error('password')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-stone-300 text-[#287D52] focus:ring-[#287D52]">
                        <span class="text-xs text-stone-600">Ingat Saya</span>
                    </label>
                </div>

                <button type="submit"
                    class="w-full py-3 px-4 rounded-xl text-white font-semibold text-sm bg-gradient-to-r from-[#14532D] to-[#287D52] hover:from-[#114324] hover:to-[#216743] shadow-md transition transform active:scale-98">
                    Masuk Sekarang
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-stone-100 text-center space-y-3">
                <p class="text-xs text-stone-600">
                    Belum memiliki akun pendaftar santri baru?
                    <a href="{{ route('register') }}" class="font-semibold text-[#287D52] hover:underline">Daftar Akun Baru</a>
                </p>
                <div class="bg-amber-50 rounded-xl p-3 border border-amber-200/80 text-[11px] text-amber-800 text-left">
                    <strong class="block mb-1 text-amber-900 font-bold">Informasi Akun Demo (Klik untuk Isi Otomatis):</strong>
                    <div class="space-y-1">
                        <button type="button" onclick="fillDemo('superadmin@pesantren.test', 'password')" class="w-full text-left px-2 py-1 rounded hover:bg-amber-100 flex items-center justify-between text-amber-900 font-medium transition cursor-pointer">
                            <span>👑 Super Admin: <code class="font-mono text-[10px]">superadmin@pesantren.test</code></span>
                            <span class="text-[10px] text-emerald-700 underline font-semibold">Pilih</span>
                        </button>
                        <button type="button" onclick="fillDemo('editor@pesantren.test', 'password')" class="w-full text-left px-2 py-1 rounded hover:bg-amber-100 flex items-center justify-between text-amber-900 font-medium transition cursor-pointer">
                            <span>✍️ Editor: <code class="font-mono text-[10px]">editor@pesantren.test</code></span>
                            <span class="text-[10px] text-emerald-700 underline font-semibold">Pilih</span>
                        </button>
                        <button type="button" onclick="fillDemo('petugas@pesantren.test', 'password')" class="w-full text-left px-2 py-1 rounded hover:bg-amber-100 flex items-center justify-between text-amber-900 font-medium transition cursor-pointer">
                            <span>📋 Petugas PSB: <code class="font-mono text-[10px]">petugas@pesantren.test</code></span>
                            <span class="text-[10px] text-emerald-700 underline font-semibold">Pilih</span>
                        </button>
                        <button type="button" onclick="fillDemo('santri1@example.com', 'password')" class="w-full text-left px-2 py-1 rounded hover:bg-amber-100 flex items-center justify-between text-amber-900 font-medium transition cursor-pointer">
                            <span>🎓 Pendaftar: <code class="font-mono text-[10px]">santri1@example.com</code></span>
                            <span class="text-[10px] text-emerald-700 underline font-semibold">Pilih</span>
                        </button>
                    </div>
                    <div class="mt-2 pt-2 border-t border-amber-200/60 text-[10px] text-amber-700">
                        Kata Sandi: <code class="bg-amber-100 px-1 py-0.5 rounded font-mono font-bold">password</code> atau <code class="bg-amber-100 px-1 py-0.5 rounded font-mono font-bold">Password123#</code>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function fillDemo(email, password) {
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    if (emailInput && passwordInput) {
        emailInput.value = email;
        passwordInput.value = password;
        passwordInput.focus();
    }
}
</script>
@endsection
