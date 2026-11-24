@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-b from-[#14532D] via-[#114324] to-[#14532D] text-white py-16 sm:py-20 lg:py-24 overflow-hidden border-b border-[#C6A55C]/30">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#C6A55C_1px,transparent_1px)] [background-size:24px_24px]"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <!-- Text Content -->
            <div class="lg:col-span-7 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-xs border border-[#C6A55C]/40 text-xs font-semibold text-[#FAF8F0] mb-6">
                    <span class="w-2 h-2 rounded-full bg-[#C6A55C] animate-ping"></span>
                    <span>Pusat Pendidikan & Dakwah Islam Berbasis Salaf & Modern</span>
                </div>

                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white max-w-4xl leading-tight">
                    {{ \App\Models\SiteSetting::get('site_name', 'Pondok Pesantren Damanhuri Romly') }}
                </h1>

                <p class="mt-5 text-base sm:text-lg lg:text-xl text-emerald-100/90 max-w-2xl font-normal leading-relaxed">
                    {{ \App\Models\SiteSetting::get('site_tagline', 'Mencetak Generasi Berakhlak Mulia, Berilmu Luas, dan Berwawasan Global.') }}
                </p>

                <div class="mt-8 sm:mt-10 flex flex-col sm:flex-row items-center lg:items-start justify-center lg:justify-start gap-3 sm:gap-4">
                    <a href="{{ route('psb.info') }}" class="w-full sm:w-auto px-6 py-3.5 rounded-xl text-sm font-bold text-[#14532D] bg-[#FAF8F0] hover:bg-white shadow-lg border-2 border-[#C6A55C] transition transform hover:-translate-y-0.5">
                        Daftar Santri Baru (PSB)
                    </a>
                    <a href="{{ route('profil.sejarah') }}" class="w-full sm:w-auto px-6 py-3.5 rounded-xl text-sm font-semibold text-white bg-white/15 hover:bg-white/25 border border-white/30 backdrop-blur-xs transition">
                        Mengenal Pesantren
                    </a>
                </div>
            </div>

            <!-- Hero Visual -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    <div class="relative overflow-hidden rounded-2xl shadow-2xl aspect-[4/3]">
                        <img src="{{ asset('images/stitch/hero-santri.jpg') }}" alt="Santri Pondok Pesantren Damanhuri Romly sedang mengaji kitab kuning" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#14532D]/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between text-white">
                            <div>
                                <span class="text-[10px] font-semibold uppercase tracking-wider text-[#C6A55C] block">Halaqah Pagi Ba'da Subuh</span>
                                <span class="text-sm font-bold">Serambi Utama Masjid Jamik PDR</span>
                            </div>
                            <div class="px-2.5 py-1 rounded bg-[#C6A55C] text-[#14532D] text-[10px] font-bold">
                                Salafiyah Murni
                            </div>
                        </div>
                    </div>
                    <!-- Floating Badge -->
                    <div class="-mt-8 ml-6 relative z-20 bg-white p-4 rounded-xl shadow-xl flex items-center gap-3 max-w-xs text-stone-800">
                        <div class="w-12 h-12 rounded-lg bg-emerald-50 flex items-center justify-center text-[#287D52]">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xl font-bold text-[#14532D]">100% Sanad</span>
                            <span class="text-[10px] text-stone-500">Tersambung ke Muassis Genggong</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats Bar -->
        <div class="mt-12 pt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="p-4 rounded-xl bg-white/5 backdrop-blur flex flex-col">
                <span class="text-2xl font-bold text-[#C6A55C]">1.850+</span>
                <span class="text-sm font-semibold text-white mt-1">Santri Mukim</span>
                <span class="text-xs text-emerald-200/80">Dari seluruh penjuru Nusantara</span>
            </div>
            <div class="p-4 rounded-xl bg-white/5 backdrop-blur flex flex-col">
                <span class="text-2xl font-bold text-[#C6A55C]">142</span>
                <span class="text-sm font-semibold text-white mt-1">Masyayikh & Asatidz</span>
                <span class="text-xs text-emerald-200/80">100% Dewan Asatidz Bersanad</span>
            </div>
            <div class="p-4 rounded-xl bg-white/5 backdrop-blur flex flex-col">
                <span class="text-2xl font-bold text-[#C6A55C]">12</span>
                <span class="text-sm font-semibold text-white mt-1">Satuan Pendidikan</span>
                <span class="text-xs text-emerald-200/80">Diniyah, KMI, Formal & Ma'had Aly</span>
            </div>
            <div class="p-4 rounded-xl bg-white/5 backdrop-blur flex flex-col">
                <span class="text-2xl font-bold text-[#C6A55C]">Unggul 'A'</span>
                <span class="text-sm font-semibold text-white mt-1">Akreditasi Terpadu</span>
                <span class="text-xs text-emerald-200/80">Kemenag RI & BAN-PDM 2026</span>
            </div>
        </div>
    </div>
</section>

<!-- Banner PSB Terbuka (Jika Aktif) -->
@if($activePeriod)
<section class="bg-gradient-to-r from-emerald-900 to-[#14532D] text-white py-4 px-4 border-b border-[#C6A55C]/40">
    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-3 text-center sm:text-left">
        <div class="flex items-center gap-3">
            <span class="p-2 bg-[#C6A55C]/20 rounded-lg text-[#C6A55C]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
            </span>
            <div>
                <strong class="text-sm font-bold text-white block">{{ $activePeriod->name }} Telah Dibuka!</strong>
                <span class="text-xs text-emerald-200">Batas pendaftaran: {{ $activePeriod->closes_at->translatedFormat('d F Y') }}</span>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('register') }}" class="text-xs font-bold px-4 py-2 rounded-lg bg-[#C6A55C] text-emerald-950 hover:bg-[#d8b86d] transition shadow-xs">
                Buat Akun & Daftar Sekarang &rarr;
            </a>
        </div>
    </div>
</section>
@endif

<!-- Keunggulan Lembaga -->
<section class="py-14 bg-white border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-6 rounded-2xl bg-[#FAF8F0] border border-stone-200/80 shadow-xs">
                <div class="w-12 h-12 rounded-xl bg-[#14532D] text-white flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-[#C6A55C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <h3 class="font-bold text-lg text-[#14532D] mb-2">Tafaqquh Fiddin Salaf</h3>
                <p class="text-xs text-stone-600 leading-relaxed">
                    Pengajian kitab kuning secara komprehensif dari dasar hingga lanjutan, dibimbing langsung oleh dewan asatidz berkompeten dengan sanad keilmuan yang bersambung.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-[#FAF8F0] border border-stone-200/80 shadow-xs">
                <div class="w-12 h-12 rounded-xl bg-[#14532D] text-white flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-[#C6A55C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="font-bold text-lg text-[#14532D] mb-2">Tahfidzul Qur'an Mutqin</h3>
                <p class="text-xs text-stone-600 leading-relaxed">
                    Program bimbingan menghafal Al-Qur'an dengan pendampingan intensif musyrif, menjaga hafalan dengan setoran harian dan muraja'ah berkala.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-[#FAF8F0] border border-stone-200/80 shadow-xs">
                <div class="w-12 h-12 rounded-xl bg-[#14532D] text-white flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-[#C6A55C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                </div>
                <h3 class="font-bold text-lg text-[#14532D] mb-2">Integrasi Kurikulum & Adab</h3>
                <p class="text-xs text-stone-600 leading-relaxed">
                    Menyelaraskan pendidikan formal dengan penempaan akhlakul karimah, kemandirian asrama 24 jam, dan penguasaan bahasa asing.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Program Unggulan -->
<section class="py-16 bg-[#FAF8F0]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-bold text-[#287D52] tracking-wider uppercase">Jenjang Pendidikan</span>
            <h2 class="text-2xl sm:text-3xl font-bold text-[#14532D] mt-1">Program Pendidikan Santri</h2>
            <p class="text-xs sm:text-sm text-stone-600 mt-2">Pilihan kurikulum terpadu untuk membentuk kepribadian santri yang seimbang antara ilmu agama dan wawasan umum.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($programs as $program)
                <div class="bg-white rounded-2xl shadow-sm border border-stone-200 p-6 flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <div class="w-10 h-10 rounded-lg bg-emerald-50 text-[#287D52] flex items-center justify-center font-bold text-sm mb-4">
                            0{{ $loop->iteration }}
                        </div>
                        <h3 class="font-bold text-lg text-[#14532D] mb-2">{{ $program->name }}</h3>
                        <p class="text-xs text-stone-600 leading-relaxed line-clamp-3">
                            {{ $program->summary }}
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-stone-100">
                        <a href="{{ route('program.show', $program->slug) }}" class="inline-flex items-center text-xs font-semibold text-[#287D52] hover:text-[#14532D] gap-1">
                            <span>Pelajari Selengkapnya</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-8 text-stone-500 text-xs">
                    Informasi program pendidikan sedang diperbarui.
                </div>
            @endforelse
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('program.index') }}" class="inline-flex items-center justify-center px-6 py-2.5 rounded-xl border border-[#287D52] text-[#287D52] hover:bg-[#287D52] hover:text-white font-medium text-xs transition">
                Lihat Seluruh Program Pendidikan
            </a>
        </div>
    </div>
</section>

<!-- Berita & Pengumuman Terbaru -->
<section class="py-16 bg-white border-t border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-10 gap-4">
            <div>
                <span class="text-xs font-bold text-[#287D52] tracking-wider uppercase">Kabar Pesantren</span>
                <h2 class="text-2xl sm:text-3xl font-bold text-[#14532D] mt-1">Berita & Informasi Terbaru</h2>
            </div>
            <a href="{{ route('berita.index') }}" class="text-xs font-semibold text-[#287D52] hover:underline inline-flex items-center gap-1">
                <span>Lihat Semua Berita</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <article class="bg-[#FAF8F0] rounded-2xl border border-stone-200 overflow-hidden flex flex-col justify-between hover:shadow-md transition group">
                    <div>
                        @if($post->image_url)
                            <a href="{{ route('berita.show', $post->slug) }}" class="block aspect-video w-full overflow-hidden bg-stone-100">
                                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            </a>
                        @else
                            <a href="{{ route('berita.show', $post->slug) }}" class="block aspect-video w-full bg-gradient-to-br from-[#14532D]/10 to-[#287D52]/15 flex items-center justify-center text-stone-400 group-hover:bg-[#14532D]/15 transition">
                                <svg class="w-12 h-12 text-[#287D52]/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                            </a>
                        @endif
                        <div class="p-6">
                            <div class="flex items-center justify-between text-[11px] text-stone-500 mb-2">
                                <span class="font-semibold text-[#287D52] bg-emerald-50 px-2 py-0.5 rounded-md">
                                    {{ $post->category?->name ?? 'Informasi' }}
                                </span>
                                <span>{{ $post->published_at?->translatedFormat('d M Y') }}</span>
                            </div>
                            <h3 class="font-bold text-base text-[#14532D] group-hover:text-[#287D52] transition mb-2 line-clamp-2">
                                <a href="{{ route('berita.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-xs text-stone-600 line-clamp-3 leading-relaxed">
                                {{ $post->summary }}
                            </p>
                        </div>
                    </div>
                    <div class="px-6 pb-6 pt-2">
                        <a href="{{ route('berita.show', $post->slug) }}" class="text-xs font-semibold text-[#287D52] hover:underline inline-flex items-center gap-1">
                            <span>Baca Artikel</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-8 text-stone-500 text-xs">
                    Belum ada berita terbit saat ini.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Agenda Mendatang -->
@if($events->isNotEmpty())
<section class="py-14 bg-stone-50 border-t border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto text-center mb-8">
            <span class="text-xs font-bold text-[#287D52] tracking-wider uppercase">Jadwal Acara</span>
            <h2 class="text-2xl font-bold text-[#14532D] mt-1">Agenda & Kegiatan Mendatang</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
            @foreach($events as $event)
                <div class="bg-white rounded-2xl p-5 border border-stone-200 flex gap-4 items-start shadow-xs">
                    <div class="w-16 h-16 rounded-xl bg-[#14532D] text-white flex flex-col items-center justify-center shrink-0">
                        <span class="text-lg font-bold leading-none">{{ $event->start_at->format('d') }}</span>
                        <span class="text-[10px] uppercase font-medium">{{ $event->start_at->translatedFormat('M') }}</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-sm text-[#14532D] mb-1">
                            <a href="{{ route('agenda.show', $event->slug) }}" class="hover:underline">{{ $event->title }}</a>
                        </h3>
                        <p class="text-xs text-stone-500 mb-2">{{ $event->location_text }}</p>
                        <p class="text-xs text-stone-600 line-clamp-2 leading-relaxed">{{ $event->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Call to Action PSB -->
<!-- Profil Pengasuh (Kyai) Section -->
<section class="py-16 bg-white border-t border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <div class="overflow-hidden rounded-2xl shadow-xl">
                    <img src="{{ asset('images/stitch/profile-header.jpg') }}" alt="Pengasuh Pondok Pesantren Damanhuri Romly" class="w-full h-80 lg:h-96 object-cover">
                </div>
                <div class="absolute -bottom-4 -right-4 w-24 h-24 rounded-xl bg-[#14532D] text-white flex flex-col items-center justify-center shadow-lg border-2 border-[#C6A55C]">
                    <img src="{{ asset('images/LOGO_PDR-removebg-preview.png') }}" alt="Logo PDR" class="w-16 h-16 object-contain">
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <span class="text-xs font-bold text-[#287D52] tracking-wider uppercase">Pengasuh & Dewan Guru</span>
                <h2 class="text-2xl sm:text-3xl font-bold text-[#14532D]">Kepemimpinan & Sanad Keilmuan</h2>
                <p class="text-sm text-stone-600 leading-relaxed">
                    Pondok Pesantren Damanhuri Romly dipimpin oleh Dewan Pengasuh yang memegang teguh sanad keilmuan mu'tabarah ulama nusantara. 
                    Didukung oleh 142 asatidz berkompeten, pesantren menjalankan tarbiyah salafiyah komprehensif yang memadukan pengajian kitab kuning dengan pendidikan sains modern.
                </p>
                <div class="flex flex-wrap gap-3 mt-2">
                    <div class="px-3 py-1.5 rounded-lg bg-emerald-50 text-[#287D52] text-xs font-semibold border border-emerald-200">100% Sanad Bersambung</div>
                    <div class="px-3 py-1.5 rounded-lg bg-amber-50 text-amber-700 text-xs font-semibold border border-amber-200">Tarbiyah Salafiyah</div>
                    <div class="px-3 py-1.5 rounded-lg bg-blue-50 text-blue-700 text-xs font-semibold border border-blue-200">142 Asatidz</div>
                </div>
                <a href="{{ route('profil.pengasuh') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-[#287D52] hover:text-[#14532D] mt-2 group">
                    Selengkapnya tentang Dewan Pengasuh
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Galeri Kegiatan Santri -->
<section class="py-16 bg-[#FAF8F0] border-t border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-bold text-[#287D52] tracking-wider uppercase">Dokumentasi Pesantren</span>
            <h2 class="text-2xl sm:text-3xl font-bold text-[#14532D] mt-1">Galeri Kegiatan Santri</h2>
            <p class="text-xs sm:text-sm text-stone-600 mt-2">Berbagai momen kegiatan santri di Pondok Pesantren Damanhuri Romly Genggong.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @php
                $galleryImages = [
                    ['src' => 'kegiatan-1.jpg', 'alt' => 'Santri belajar kitab kuning di pesantren'],
                    ['src' => 'kegiatan-2.jpg', 'alt' => 'Kegiatan mengaji Al-Quran di masjid pesantren'],
                    ['src' => 'kegiatan-3.jpg', 'alt' => 'Kegiatan ekstrakulikuler santri'],
                    ['src' => 'kegiatan-4.jpg', 'alt' => 'Santri berkegiatan di lingkungan pesantren'],
                    ['src' => 'kegiatan-5.jpg', 'alt' => 'Acara haflah akhirussanah pesantren'],
                    ['src' => 'kegiatan-6.jpg', 'alt' => 'Kegiatan olahraga dan seni santri'],
                    ['src' => 'kegiatan-7.jpg', 'alt' => 'Suasana belajar di kelas pesantren'],
                    ['src' => 'hero-santri.jpg', 'alt' => 'Halaqah pagi di serambi masjid pesantren'],
                ];
            @endphp
            @foreach($galleryImages as $img)
                <div class="group relative overflow-hidden rounded-xl aspect-square shadow-sm hover:shadow-lg transition-all duration-300">
                    <img src="{{ asset('images/stitch/' . $img['src']) }}" alt="{{ $img['alt'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#14532D]/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="absolute bottom-3 left-3 text-white text-xs font-semibold">{{ $img['alt'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('galeri.index') }}" class="inline-flex items-center justify-center px-6 py-2.5 rounded-xl border border-[#287D52] text-[#287D52] hover:bg-[#287D52] hover:text-white font-medium text-xs transition">
                Lihat Seluruh Galeri Foto
            </a>
        </div>
    </div>
</section>

<!-- Call to Action PSB -->
<section class="py-16 bg-gradient-to-br from-[#14532D] to-[#287D52] text-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-2xl sm:text-4xl font-extrabold tracking-tight">Bergabunglah Bersama Pondok Pesantren Damanhuri Romly</h2>
        <p class="mt-4 text-xs sm:text-base text-emerald-100 max-w-2xl mx-auto leading-relaxed">
            Menyiapkan generasi penerus bangsa yang faqih dalam agama, teguh dalam aqidah, dan berdaya saing tinggi. Daftarkan putra-putri Anda melalui portal pendaftaran daring resmi.
        </p>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
            <a href="{{ route('psb.info') }}" class="px-6 py-3 rounded-xl bg-white text-[#14532D] font-bold text-xs sm:text-sm hover:bg-stone-100 shadow-lg border border-[#C6A55C] transition">
                Panduan Pendaftaran (PSB)
            </a>
            <a href="{{ route('kontak.index') }}" class="px-6 py-3 rounded-xl bg-white/10 text-white font-semibold text-xs sm:text-sm hover:bg-white/20 border border-white/20 transition">
                Hubungi Sekretariat
            </a>
        </div>
    </div>
</section>
@endsection
