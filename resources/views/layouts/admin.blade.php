<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Pengelola') - Pondok Pesantren Damanhuri Romly</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/png" href="{{ asset('images/LOGO_PDR-removebg-preview.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-100 text-stone-800 font-sans antialiased min-h-screen flex">

    <!-- Sidebar Desktop -->
    <aside class="w-64 bg-[#14532D] text-white flex-col shrink-0 hidden md:flex border-r border-emerald-950/40">
        <!-- Sidebar Brand -->
        <div class="h-16 flex items-center px-6 gap-3 border-b border-emerald-800/60 bg-[#114324]">
            <img src="{{ asset('images/LOGO_PDR-removebg-preview.png') }}" alt="Logo Pesantren" class="w-8 h-8 rounded-lg object-contain border border-[#C6A55C]/60">
            <div>
                <span class="font-bold text-sm leading-tight block">Admin Pesantren</span>
                <span class="text-[10px] text-emerald-300 font-medium">Panel Pengendali</span>
            </div>
        </div>

        <!-- Sidebar Navigation -->
        <nav class="flex-grow p-4 space-y-1 text-xs font-medium overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-700 text-white font-semibold' : 'text-emerald-100 hover:bg-emerald-800/60' }}">
                <svg class="w-4 h-4 text-[#C6A55C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Dashboard</span>
            </a>

            @if(auth()->user()->canManageContent())
                <div class="pt-4 pb-1 px-3 text-[10px] font-semibold text-emerald-300/70 uppercase tracking-wider">Konten & Publikasi</div>
                
                <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl transition {{ request()->routeIs('admin.posts.*') ? 'bg-emerald-700 text-white font-semibold' : 'text-emerald-100 hover:bg-emerald-800/60' }}">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    <span>Berita & Artikel</span>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl transition {{ request()->routeIs('admin.categories.*') ? 'bg-emerald-700 text-white font-semibold' : 'text-emerald-100 hover:bg-emerald-800/60' }}">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    <span>Kategori Berita</span>
                </a>

                <a href="{{ route('admin.programs.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl transition {{ request()->routeIs('admin.programs.*') ? 'bg-emerald-700 text-white font-semibold' : 'text-emerald-100 hover:bg-emerald-800/60' }}">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    <span>Program Pendidikan</span>
                </a>

                <a href="{{ route('admin.pages.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl transition {{ request()->routeIs('admin.pages.*') ? 'bg-emerald-700 text-white font-semibold' : 'text-emerald-100 hover:bg-emerald-800/60' }}">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span>Halaman Statis</span>
                </a>

                <a href="{{ route('admin.events.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl transition {{ request()->routeIs('admin.events.*') ? 'bg-emerald-700 text-white font-semibold' : 'text-emerald-100 hover:bg-emerald-800/60' }}">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Agenda Kegiatan</span>
                </a>

                <a href="{{ route('admin.facilities.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl transition {{ request()->routeIs('admin.facilities.*') ? 'bg-emerald-700 text-white font-semibold' : 'text-emerald-100 hover:bg-emerald-800/60' }}">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    <span>Fasilitas Pesantren</span>
                </a>

                <a href="{{ route('admin.galleries.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl transition {{ request()->routeIs('admin.galleries.*') ? 'bg-emerald-700 text-white font-semibold' : 'text-emerald-100 hover:bg-emerald-800/60' }}">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Album Galeri</span>
                </a>

                <a href="{{ route('admin.faqs.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl transition {{ request()->routeIs('admin.faqs.*') ? 'bg-emerald-700 text-white font-semibold' : 'text-emerald-100 hover:bg-emerald-800/60' }}">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Tanya Jawab (FAQ)</span>
                </a>

                <a href="{{ route('admin.messages.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl transition {{ request()->routeIs('admin.messages.*') ? 'bg-emerald-700 text-white font-semibold' : 'text-emerald-100 hover:bg-emerald-800/60' }}">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>Pesan Masuk</span>
                </a>
            @endif

            @if(auth()->user()->canReviewPsb())
                <div class="pt-4 pb-1 px-3 text-[10px] font-semibold text-emerald-300/70 uppercase tracking-wider">Penerimaan Santri (PSB)</div>

                <a href="{{ route('admin.psb.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl transition {{ request()->routeIs('admin.psb.index*') || request()->routeIs('admin.psb.show') ? 'bg-emerald-700 text-white font-semibold' : 'text-emerald-100 hover:bg-emerald-800/60' }}">
                    <svg class="w-4 h-4 text-[#C6A55C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                    <span>Verifikasi Berkas PSB</span>
                </a>

                <a href="{{ route('admin.psb.periods.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl transition {{ request()->routeIs('admin.psb.periods.*') ? 'bg-emerald-700 text-white font-semibold' : 'text-emerald-100 hover:bg-emerald-800/60' }}">
                    <svg class="w-4 h-4 text-[#C6A55C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Periode & Kuota PSB</span>
                </a>
            @endif

            @if(auth()->user()->isSuperAdmin())
                <div class="pt-4 pb-1 px-3 text-[10px] font-semibold text-emerald-300/70 uppercase tracking-wider">Administrasi Sistem</div>

                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl transition {{ request()->routeIs('admin.users.*') ? 'bg-emerald-700 text-white font-semibold' : 'text-emerald-100 hover:bg-emerald-800/60' }}">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span>Kelola Pengguna & Staf</span>
                </a>

                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl transition {{ request()->routeIs('admin.settings.*') ? 'bg-emerald-700 text-white font-semibold' : 'text-emerald-100 hover:bg-emerald-800/60' }}">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>Pengaturan Identitas Situs</span>
                </a>

                <a href="{{ route('admin.audit-logs.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl transition {{ request()->routeIs('admin.audit-logs.*') ? 'bg-emerald-700 text-white font-semibold' : 'text-emerald-100 hover:bg-emerald-800/60' }}">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span>Log Aktivitas & Audit</span>
                </a>
            @endif
        </nav>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-emerald-800/60 bg-[#114324]/60">
            <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-center gap-2 text-xs text-emerald-200 hover:text-white py-2 px-3 rounded-xl hover:bg-emerald-800/40 transition">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                <span>Lihat Website Publik</span>
            </a>
        </div>
    </aside>

    <!-- Main Container -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <!-- Top Header -->
        <header class="h-16 bg-white border-b border-stone-200 flex items-center justify-between px-4 sm:px-6 z-10">
            <div class="flex items-center gap-3">
                <h1 class="text-base sm:text-lg font-bold text-stone-800 truncate">
                    @yield('header_title', 'Panel Pengelola')
                </h1>
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2.5">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                        {{ auth()->user()->role->label() }}
                    </span>
                    <span class="text-xs text-stone-600 hidden sm:inline font-semibold">
                        {{ auth()->user()->name }}
                    </span>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-xs text-rose-600 hover:text-rose-800 font-semibold px-3 py-1.5 rounded-lg border border-rose-200 hover:bg-rose-50 transition">
                        Keluar
                    </button>
                </form>
            </div>
        </header>

        <!-- Flash Banners -->
        @if(session('success'))
            <div class="bg-emerald-50 border-b border-emerald-200 px-6 py-2.5 text-xs text-emerald-800 font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error') || $errors->any())
            <div class="bg-rose-50 border-b border-rose-200 px-6 py-2.5 text-xs text-rose-800 font-medium">
                {{ session('error') ?? $errors->first() }}
            </div>
        @endif

        <!-- Page Body -->
        <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
