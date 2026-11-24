@extends('layouts.public')

@section('title', 'Pendaftaran Santri Baru (PSB)')

@section('content')
<div class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-xs text-stone-500 mb-6">
            <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
            <span>/</span>
            <span class="text-stone-800 font-semibold">Informasi PSB</span>
        </nav>

        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#14532D] tracking-tight">Pendaftaran Santri Baru (PSB)</h1>
        <p class="text-xs sm:text-sm text-stone-500 mt-2">Panduan, persyaratan administrasi, dan alur seleksi daring</p>
    </div>
</div>

<div class="py-12 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
    <!-- Status Periode PSB -->
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-sm">
        @if($activePeriod)
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200 mb-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>Pendaftaran Sedang Dibuka</span>
                    </span>
                    <h2 class="text-xl font-bold text-[#14532D]">{{ $activePeriod->name }}</h2>
                    <p class="text-xs text-stone-600 mt-1">
                        Periode: <strong>{{ $activePeriod->opens_at->translatedFormat('d F Y') }}</strong> s.d. <strong>{{ $activePeriod->closes_at->translatedFormat('d F Y') }}</strong>
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                    @auth
                        @if(auth()->user()->isApplicant())
                            <a href="{{ route('applicant.registration.form') }}" class="px-5 py-2.5 rounded-xl bg-[#14532D] text-white text-xs font-semibold text-center hover:bg-[#114324] transition">
                                Buka Formulir Pendaftaran &rarr;
                            </a>
                        @else
                            <a href="{{ route('admin.psb.index') }}" class="px-5 py-2.5 rounded-xl bg-[#14532D] text-white text-xs font-semibold text-center hover:bg-[#114324] transition">
                                Buka Panel Verifikasi PSB &rarr;
                            </a>
                        @endif
                    @else
                        <a href="{{ route('register') }}" class="px-5 py-2.5 rounded-xl bg-[#14532D] text-white text-xs font-semibold text-center hover:bg-[#114324] transition">
                            Buat Akun Pendaftar
                        </a>
                        <a href="{{ route('login') }}" class="px-5 py-2.5 rounded-xl border border-stone-300 text-stone-700 text-xs font-semibold text-center hover:bg-stone-50 transition">
                            Masuk Akun
                        </a>
                    @endauth
                </div>
            </div>
            @if($activePeriod->description)
                <p class="text-xs text-stone-600 mt-4 pt-4 border-t border-stone-100 leading-relaxed">
                    {{ $activePeriod->description }}
                </p>
            @endif
        @else
            <div class="text-center py-6">
                <span class="inline-block p-3 rounded-full bg-amber-100 text-amber-800 mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </span>
                <h2 class="text-lg font-bold text-stone-800">Saat Ini Belum Ada Gelombang PSB Aktif</h2>
                <p class="text-xs text-stone-500 max-w-md mx-auto mt-1">
                    Silakan pantau berkala pengumuman di website ini atau hubungi layanan sekretariat kami untuk jadwal pembukaan gelombang berikutnya.
                </p>
            </div>
        @endif
    </div>

    <!-- Alur 4 Langkah Pendaftaran -->
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-sm">
        <h2 class="text-xl font-bold text-[#14532D] mb-6">Alur Pendaftaran Daring</h2>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 relative">
            <div class="space-y-2">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-[#14532D] font-bold flex items-center justify-center text-sm border border-emerald-200">
                    1
                </div>
                <h3 class="font-bold text-sm text-[#14532D]">Buat Akun</h3>
                <p class="text-xs text-stone-600 leading-relaxed">Daftarkan akun calon santri / wali santri menggunakan email dan nomor telepon aktif.</p>
            </div>

            <div class="space-y-2">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-[#14532D] font-bold flex items-center justify-center text-sm border border-emerald-200">
                    2
                </div>
                <h3 class="font-bold text-sm text-[#14532D]">Isi Data Diri</h3>
                <p class="text-xs text-stone-600 leading-relaxed">Lengkapi identitas calon santri, data wali penanggung jawab, serta pilihan program.</p>
            </div>

            <div class="space-y-2">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-[#14532D] font-bold flex items-center justify-center text-sm border border-emerald-200">
                    3
                </div>
                <h3 class="font-bold text-sm text-[#14532D]">Unggah Berkas</h3>
                <p class="text-xs text-stone-600 leading-relaxed">Upload scan berkas Kartu Keluarga, Akta Kelahiran, Rapor/Ijazah, dan Pas Foto ke media privat.</p>
            </div>

            <div class="space-y-2">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-[#14532D] font-bold flex items-center justify-center text-sm border border-emerald-200">
                    4
                </div>
                <h3 class="font-bold text-sm text-[#14532D]">Verifikasi & Seleksi</h3>
                <p class="text-xs text-stone-600 leading-relaxed">Kirim pengajuan dan pantau status verifikasi petugas secara realtime melalui portal pendaftar.</p>
            </div>
        </div>
    </div>

    <!-- Syarat Dokumen Administrasi -->
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-sm space-y-4">
        <h2 class="text-xl font-bold text-[#14532D]">Syarat Berkas yang Diperlukan</h2>
        @if($activePeriod && $activePeriod->requirements_text)
            <div class="text-xs sm:text-sm text-stone-700 leading-relaxed whitespace-pre-line space-y-2">
                {{ $activePeriod->requirements_text }}
            </div>
        @else
            <ul class="list-disc list-inside text-xs sm:text-sm text-stone-700 space-y-1.5 leading-relaxed">
                <li>Scan / Foto Kartu Keluarga (KK) asli yang jelas.</li>
                <li>Scan / Foto Akta Kelahiran calon santri.</li>
                <li>Scan Ijazah atau Surat Keterangan Lulus (SKL) / Rapor semester terakhir.</li>
                <li>Pas foto terbaru calon santri berbusana muslim / rapi.</li>
            </ul>
        @endif
        <div class="p-4 rounded-xl bg-stone-50 border border-stone-200 text-xs text-stone-600">
            <strong>Keamanan & Privasi Dokumen:</strong> Seluruh berkas yang Anda unggah disimpan secara privat dalam server terlindungi dan hanya dapat diakses oleh Anda serta panitia seleksi resmi Pondok Pesantren Damanhuri Romly.
        </div>
    </div>
</div>
@endsection
