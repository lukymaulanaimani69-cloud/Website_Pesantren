<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pondok Pesantren Damanhuri Romly') - Pusat Informasi Resmi</title>
    <meta name="description" content="@yield('meta_description', \App\Models\SiteSetting::get('site_description', 'Website Resmi Pondok Pesantren Damanhuri Romly.'))">
    <meta name="robots" content="index, follow">
    <link rel="icon" type="image/png" href="{{ asset('images/LOGO_PDR-removebg-preview.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/LOGO_PDR-removebg-preview.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FAF8F0] text-[#1F2937] font-sans antialiased min-h-screen flex flex-col selection:bg-[#287D52] selection:text-white">

    <!-- Topbar Kontak Resmi -->
    <div class="bg-[#14532D] text-xs text-emerald-100 py-2 border-b border-emerald-900/40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-4 flex-wrap">
                <span class="inline-flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-[#C6A55C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>{{ \App\Models\SiteSetting::get('contact_phone', '(0335) xxxxxxx') }}</span>
                </span>
                <span class="inline-flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-[#C6A55C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>{{ \App\Models\SiteSetting::get('contact_email', 'kontak@damanhuriromly.sch.id') }}</span>
                </span>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('psb.info') }}" class="text-[#C6A55C] hover:text-white font-medium transition inline-flex items-center gap-1">
                    <span>Informasi PSB 2026/2027</span>
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                </a>
                @auth
                    <span class="text-emerald-400">|</span>
                    @if(auth()->user()->isApplicant())
                        <a href="{{ route('applicant.dashboard') }}" class="hover:text-white font-medium">Portal Santri ({{ auth()->user()->name }})</a>
                    @else
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-white font-medium">Panel Staf</a>
                    @endif
                @else
                    <span class="text-emerald-400">|</span>
                    <a href="{{ route('login') }}" class="hover:text-white font-medium">Masuk</a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Header & Navigation -->
    <header class="bg-white/95 backdrop-blur-md sticky top-0 z-40 border-b border-stone-200/80 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Brand / Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/LOGO_PDR-removebg-preview.png') }}" alt="Logo Pondok Pesantren Damanhuri Romly" class="w-11 h-11 rounded-xl object-contain shadow-md border border-[#C6A55C]/40 group-hover:scale-105 transition">
                    <div>
                        <span class="block font-bold text-lg sm:text-xl text-[#14532D] tracking-tight leading-snug">
                            {{ \App\Models\SiteSetting::get('site_name', 'Pondok Pesantren Damanhuri Romly') }}
                        </span>
                        <span class="block text-xs text-stone-500 font-medium">Berakhlak, Berilmu, dan Berwawasan Global</span>
                    </div>
                </a>

                <!-- Desktop Nav -->
                <nav class="hidden lg:flex items-center gap-6 text-sm font-medium text-stone-700">
                    <a href="{{ route('home') }}" class="hover:text-[#287D52] transition {{ request()->routeIs('home') ? 'text-[#287D52] font-semibold' : '' }}">Beranda</a>
                    
                    <div class="relative group">
                        <button class="inline-flex items-center gap-1 hover:text-[#287D52] py-2 transition {{ request()->routeIs('profil.*') ? 'text-[#287D52] font-semibold' : '' }}">
                            <span>Profil</span>
                            <svg class="w-4 h-4 text-stone-400 group-hover:rotate-180 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="absolute left-0 mt-0 w-48 bg-white rounded-xl shadow-lg border border-stone-100 py-2 hidden group-hover:block transition z-50">
                            <a href="{{ route('profil.sejarah') }}" class="block px-4 py-2 hover:bg-emerald-50 hover:text-[#287D52] text-xs">Sejarah Pesantren</a>
                            <a href="{{ route('profil.visi-misi') }}" class="block px-4 py-2 hover:bg-emerald-50 hover:text-[#287D52] text-xs">Visi & Misi</a>
                            <a href="{{ route('profil.pengasuh') }}" class="block px-4 py-2 hover:bg-emerald-50 hover:text-[#287D52] text-xs">Pengasuh & Dewan Guru</a>
                        </div>
                    </div>

                    <a href="{{ route('program.index') }}" class="hover:text-[#287D52] transition {{ request()->routeIs('program.*') ? 'text-[#287D52] font-semibold' : '' }}">Program</a>
                    <a href="{{ route('berita.index') }}" class="hover:text-[#287D52] transition {{ request()->routeIs('berita.*') ? 'text-[#287D52] font-semibold' : '' }}">Berita</a>
                    <a href="{{ route('agenda.index') }}" class="hover:text-[#287D52] transition {{ request()->routeIs('agenda.*') ? 'text-[#287D52] font-semibold' : '' }}">Agenda</a>
                    <a href="{{ route('fasilitas.index') }}" class="hover:text-[#287D52] transition {{ request()->routeIs('fasilitas.*') ? 'text-[#287D52] font-semibold' : '' }}">Fasilitas</a>
                    <a href="{{ route('galeri.index') }}" class="hover:text-[#287D52] transition {{ request()->routeIs('galeri.*') ? 'text-[#287D52] font-semibold' : '' }}">Galeri</a>
                    <a href="{{ route('faq.index') }}" class="hover:text-[#287D52] transition {{ request()->routeIs('faq.*') ? 'text-[#287D52] font-semibold' : '' }}">FAQ</a>
                    <a href="{{ route('kontak.index') }}" class="hover:text-[#287D52] transition {{ request()->routeIs('kontak.*') ? 'text-[#287D52] font-semibold' : '' }}">Kontak</a>

                    <a href="{{ route('psb.info') }}" class="inline-flex items-center justify-center px-4 py-2 rounded-xl text-white bg-gradient-to-r from-[#14532D] to-[#287D52] hover:from-[#114324] hover:to-[#216743] shadow-xs text-xs font-semibold tracking-wide border border-[#C6A55C]/40 transition">
                        Daftar Santri Baru
                    </a>
                </nav>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden flex items-center">
                    <button id="mobileMenuBtn" type="button" class="p-2 rounded-lg text-stone-600 hover:text-[#14532D] hover:bg-stone-100 focus:outline-hidden" aria-label="Menu Navigasi">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Nav Drawer -->
        <div id="mobileMenu" class="lg:hidden hidden border-t border-stone-200 bg-white px-4 pt-3 pb-6 space-y-2">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-stone-800 hover:bg-emerald-50">Beranda</a>
            <div class="px-3 py-2 text-xs font-semibold text-stone-400 uppercase tracking-wider">Profil</div>
            <a href="{{ route('profil.sejarah') }}" class="block pl-6 pr-3 py-1.5 rounded-lg text-sm text-stone-700 hover:bg-emerald-50">Sejarah Pesantren</a>
            <a href="{{ route('profil.visi-misi') }}" class="block pl-6 pr-3 py-1.5 rounded-lg text-sm text-stone-700 hover:bg-emerald-50">Visi & Misi</a>
            <a href="{{ route('profil.pengasuh') }}" class="block pl-6 pr-3 py-1.5 rounded-lg text-sm text-stone-700 hover:bg-emerald-50">Pengasuh & Dewan Guru</a>
            <a href="{{ route('program.index') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-stone-800 hover:bg-emerald-50">Program Pendidikan</a>
            <a href="{{ route('berita.index') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-stone-800 hover:bg-emerald-50">Berita & Pengumuman</a>
            <a href="{{ route('agenda.index') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-stone-800 hover:bg-emerald-50">Agenda Kegiatan</a>
            <a href="{{ route('fasilitas.index') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-stone-800 hover:bg-emerald-50">Fasilitas</a>
            <a href="{{ route('galeri.index') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-stone-800 hover:bg-emerald-50">Galeri Foto</a>
            <a href="{{ route('faq.index') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-stone-800 hover:bg-emerald-50">Tanya Jawab (FAQ)</a>
            <a href="{{ route('kontak.index') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-stone-800 hover:bg-emerald-50">Kontak Kami</a>
            <div class="pt-4 border-t border-stone-100 flex flex-col gap-2">
                <a href="{{ route('psb.info') }}" class="w-full text-center py-2.5 rounded-xl bg-[#14532D] text-white font-semibold text-sm">
                    Pendaftaran Santri Baru
                </a>
                @guest
                    <a href="{{ route('login') }}" class="w-full text-center py-2.5 rounded-xl border border-stone-300 text-stone-700 font-medium text-sm">
                        Masuk Akun
                    </a>
                @endguest
            </div>
        </div>
    </header>

    <!-- Flash Notification Banners -->
    @if(session('success'))
        <div class="bg-emerald-50 border-b border-emerald-200 px-4 py-3">
            <div class="max-w-7xl mx-auto flex items-center justify-between text-emerald-800 text-sm">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        </div>
    @endif

    @if(session('error') || $errors->any())
        <div class="bg-rose-50 border-b border-rose-200 px-4 py-3">
            <div class="max-w-7xl mx-auto flex items-center gap-2 text-rose-800 text-sm">
                <svg class="w-5 h-5 text-rose-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                <span>{{ session('error') ?? $errors->first() }}</span>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#14532D] text-stone-200 border-t border-emerald-900/60 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Identitas -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/LOGO_PDR-removebg-preview.png') }}" alt="Logo Pondok Pesantren Damanhuri Romly" class="w-10 h-10 rounded-xl object-contain border border-[#C6A55C]/40">
                        <span class="font-bold text-white text-base leading-tight">
                            {{ \App\Models\SiteSetting::get('site_name', 'Pondok Pesantren Damanhuri Romly') }}
                        </span>
                    </div>
                    <p class="text-xs text-emerald-100/80 leading-relaxed">
                        {{ \App\Models\SiteSetting::get('site_description', 'Lembaga pendidikan Islam berpegang teguh pada Al-Qur\'an dan As-Sunnah.') }}
                    </p>
                    <div class="text-xs text-[#C6A55C]">
                        {{ \App\Models\SiteSetting::get('site_tagline', 'Mencetak Generasi Berakhlak Mulia & Berilmu Luas') }}
                    </div>
                </div>

                <!-- Tautan Cepat -->
                <div>
                    <h3 class="text-sm font-semibold text-white tracking-wider uppercase mb-4">Navigasi Utama</h3>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('profil.sejarah') }}" class="hover:text-white transition">Sejarah & Profil Lembaga</a></li>
                        <li><a href="{{ route('profil.visi-misi') }}" class="hover:text-white transition">Visi dan Misi</a></li>
                        <li><a href="{{ route('program.index') }}" class="hover:text-white transition">Program Pendidikan & Tahfidz</a></li>
                        <li><a href="{{ route('berita.index') }}" class="hover:text-white transition">Berita & Informasi Pesantren</a></li>
                        <li><a href="{{ route('fasilitas.index') }}" class="hover:text-white transition">Fasilitas Kampus</a></li>
                        <li><a href="{{ route('galeri.index') }}" class="hover:text-white transition">Galeri Aktivitas Santri</a></li>
                    </ul>
                </div>

                <!-- Pendaftaran & Bantuan -->
                <div>
                    <h3 class="text-sm font-semibold text-white tracking-wider uppercase mb-4">Pendaftaran (PSB)</h3>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('psb.info') }}" class="hover:text-white transition">Informasi & Jadwal PSB</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-white transition">Buat Akun Pendaftar Baru</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-white transition">Masuk Portal Pendaftar</a></li>
                        <li><a href="{{ route('faq.index') }}" class="hover:text-white transition">Pertanyaan Umum (FAQ)</a></li>
                        <li><a href="{{ route('kebijakan-privasi') }}" class="hover:text-white transition">Kebijakan Privasi Data</a></li>
                    </ul>
                </div>

                <!-- Kontak & Alamat -->
                <div>
                    <h3 class="text-sm font-semibold text-white tracking-wider uppercase mb-4">Sekretariat</h3>
                    <p class="text-xs text-emerald-100/80 leading-relaxed mb-3">
                        {{ \App\Models\SiteSetting::get('contact_address', '[Alamat Resmi Belum Terkonfirmasi]') }}
                    </p>
                    <div class="text-xs space-y-1.5 text-emerald-100/90">
                        <div><strong class="text-white">Telepon:</strong> {{ \App\Models\SiteSetting::get('contact_phone', '(0335) xxxxxxx') }}</div>
                        <div><strong class="text-white">WhatsApp:</strong> {{ \App\Models\SiteSetting::get('contact_whatsapp', '08xxxxxxxxxx') }}</div>
                        <div><strong class="text-white">Email:</strong> {{ \App\Models\SiteSetting::get('contact_email', 'kontak@damanhuriromly.sch.id') }}</div>
                    </div>
                </div>
            </div>

            <div class="border-t border-emerald-800/60 mt-10 pt-6 flex flex-col sm:flex-row justify-between items-center text-xs text-emerald-200/60 gap-4">
                <p>&copy; {{ date('Y') }} Pondok Pesantren Damanhuri Romly. Seluruh hak cipta dilindungi undang-undang.</p>
                <div class="flex items-center gap-4">
                    <a href="{{ route('kebijakan-privasi') }}" class="hover:text-emerald-100 transition">Kebijakan Privasi</a>
                    <span>&bull;</span>
                    <a href="{{ route('login') }}" class="hover:text-emerald-100 transition">Login Internal</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const btn = document.getElementById('mobileMenuBtn');
        const menu = document.getElementById('mobileMenu');
        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>
