@extends('layouts.public')

@section('title', 'Pendaftaran Akun Calon Santri / Wali')

@section('content')
<div class="py-12 sm:py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto">
        <div class="bg-white rounded-2xl shadow-xl border border-stone-200/80 p-8 sm:p-10">
            <div class="text-center mb-8">
                <img src="{{ asset('images/LOGO_PDR-removebg-preview.png') }}" alt="Logo Pondok Pesantren Damanhuri Romly" class="w-14 h-14 rounded-2xl object-contain shadow-md border border-[#C6A55C]/40 mb-3">
                <h1 class="text-2xl font-bold text-[#14532D]">Buat Akun Pendaftar</h1>
                <p class="text-sm text-stone-500 mt-1">Langkah awal mengajukan Pendaftaran Santri Baru (PSB)</p>
            </div>

            <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Nama Lengkap (Wali / Calon Santri)</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52] focus:border-transparent transition"
                        placeholder="Contoh: H. Ahmad Subagio">
                    @error('name')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Alamat Email Aktif</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52] focus:border-transparent transition"
                        placeholder="nama@email.com">
                    <p class="text-[11px] text-stone-500 mt-0.5">Digunakan untuk login dan pemberitahuan hasil seleksi.</p>
                    @error('email')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Nomor WhatsApp / HP Aktif</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52] focus:border-transparent transition"
                        placeholder="081234567890">
                    @error('phone')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Kata Sandi (Min. 8 Karakter)</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52] focus:border-transparent transition"
                        placeholder="••••••••">
                    @error('password')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52] focus:border-transparent transition"
                        placeholder="••••••••">
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-3 px-4 rounded-xl text-white font-semibold text-sm bg-gradient-to-r from-[#14532D] to-[#287D52] hover:from-[#114324] hover:to-[#216743] shadow-md transition transform active:scale-98">
                        Daftar Akun Sekarang
                    </button>
                </div>
            </form>

            <div class="mt-6 pt-6 border-t border-stone-100 text-center">
                <p class="text-xs text-stone-600">
                    Sudah pernah mendaftar?
                    <a href="{{ route('login') }}" class="font-semibold text-[#287D52] hover:underline">Masuk ke Akun Anda</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
