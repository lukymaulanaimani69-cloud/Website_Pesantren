@extends('layouts.public')

@section('title', 'Kebijakan Privasi & Perlindungan Data')

@section('content')
<div class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-xs text-stone-500 mb-6">
            <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
            <span>/</span>
            <span class="text-stone-800 font-semibold">Kebijakan Privasi</span>
        </nav>

        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#14532D] tracking-tight">Kebijakan Privasi & Perlindungan Data Santri</h1>
        <p class="text-xs sm:text-sm text-stone-500 mt-2">Komitmen transparansi dan perlindungan privasi calon santri dan wali santri</p>
    </div>
</div>

<div class="py-12 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-2xl p-6 sm:p-10 border border-stone-200 shadow-sm space-y-6 text-stone-700 text-sm leading-relaxed">
        @if($page && $page->body)
            <div class="prose max-w-none text-stone-700 text-sm leading-relaxed space-y-4">
                {!! $page->body !!}
            </div>
        @else
            <h2 class="text-lg font-bold text-[#14532D]">1. Prinsip Data Minimum</h2>
            <p>Pondok Pesantren Damanhuri Romly membatasi pengumpulan data pendaftar hanya pada atribut yang esensial untuk kepentingan verifikasi identitas santri, penugasan jenjang kurikulum, dan sarana komunikasi resmi dengan wali santri.</p>

            <h2 class="text-lg font-bold text-[#14532D] mt-6">2. Keamanan Berkas Privat</h2>
            <p>Seluruh dokumen yang diunggah (seperti Kartu Keluarga, Akta Kelahiran, dan Ijazah) disimpan di dalam media penyimpanan privat yang tidak dapat diakses melalui tautan publik sembarangan. Akses berkas dibatasi secara ketat oleh otorisasi server-side hanya untuk pemilik akun dan petugas verifikasi resmi.</p>

            <h2 class="text-lg font-bold text-[#14532D] mt-6">3. Kerahasiaan Kontak</h2>
            <p>Nomor kontak telepon atau WhatsApp wali santri hanya digunakan untuk keperluan koordinasi seleksi PSB, pengumuman hasil, dan administrasi pesantren, serta tidak akan dialihkan ke pihak luar.</p>
        @endif
    </div>
</div>
@endsection
