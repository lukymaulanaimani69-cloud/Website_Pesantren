<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Pendaftaran Santri Baru') - Pondok Pesantren Damanhuri Romly</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/png" href="{{ asset('images/LOGO_PDR-removebg-preview.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FAF8F0] text-stone-800 font-sans antialiased min-h-screen flex flex-col">

    <!-- Topbar Portal -->
    <header class="bg-[#14532D] text-white border-b border-emerald-950/40 sticky top-0 z-30 shadow-md">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/LOGO_PDR-removebg-preview.png') }}" alt="Logo Pesantren" class="w-9 h-9 rounded-lg object-contain border border-[#C6A55C]/40">
                    <div>
                        <span class="font-bold text-sm block leading-tight">Portal Calon Santri / Wali</span>
                        <span class="text-[10px] text-emerald-200">Pondok Pesantren Damanhuri Romly</span>
                    </div>
                </a>
            </div>

            <div class="flex items-center gap-4">
                <div class="hidden sm:block text-right">
                    <span class="text-xs font-semibold block leading-tight">{{ auth()->user()->name }}</span>
                    <span class="text-[10px] text-emerald-300">{{ auth()->user()->email }}</span>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-xs text-rose-200 hover:text-white font-medium px-3 py-1.5 rounded-lg border border-rose-300/40 hover:bg-rose-900/40 transition">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Sub Navigation for Applicant -->
    <div class="bg-white border-b border-stone-200 shadow-xs">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-6 text-xs font-medium text-stone-600">
            <a href="{{ route('applicant.dashboard') }}" class="py-3.5 border-b-2 transition {{ request()->routeIs('applicant.dashboard') ? 'border-[#14532D] text-[#14532D] font-bold' : 'border-transparent hover:text-stone-900' }}">
                Ringkasan Pendaftaran
            </a>
            <a href="{{ route('applicant.registration.form') }}" class="py-3.5 border-b-2 transition {{ request()->routeIs('applicant.registration.form') ? 'border-[#14532D] text-[#14532D] font-bold' : 'border-transparent hover:text-stone-900' }}">
                Formulir Santri Baru
            </a>
            <a href="{{ route('home') }}" target="_blank" class="py-3.5 ml-auto text-emerald-700 hover:text-emerald-900 flex items-center gap-1">
                <span>Website Resmi Pesantren</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>
    </div>

    <!-- Flash Notification Banners -->
    @if(session('success'))
        <div class="bg-emerald-50 border-b border-emerald-200 px-4 py-3">
            <div class="max-w-6xl mx-auto flex items-center gap-2 text-emerald-800 text-xs font-medium">
                <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error') || $errors->any())
        <div class="bg-rose-50 border-b border-rose-200 px-4 py-3">
            <div class="max-w-6xl mx-auto flex items-center gap-2 text-rose-800 text-xs font-medium">
                <svg class="w-4 h-4 text-rose-600 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                <span>{{ session('error') ?? $errors->first() }}</span>
            </div>
        </div>
    @endif

    <!-- Main Content Area -->
    <main class="flex-grow max-w-6xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-stone-200 py-6 text-center text-xs text-stone-500">
        <div class="max-w-6xl mx-auto px-4">
            <p>&copy; {{ date('Y') }} Panitia PSB Pondok Pesantren Damanhuri Romly. Kerahasiaan data calon santri dan wali terlindungi.</p>
        </div>
    </footer>
</body>
</html>
