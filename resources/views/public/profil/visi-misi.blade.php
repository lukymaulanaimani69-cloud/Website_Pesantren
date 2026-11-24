@extends('layouts.public')

@section('title', 'Visi dan Misi')

@section('content')
<div class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-xs text-stone-500 mb-6">
            <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span class="text-stone-800 font-semibold">Visi & Misi</span>
        </nav>

        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#14532D] tracking-tight">Visi & Misi Lembaga</h1>
        <p class="text-xs sm:text-sm text-stone-500 mt-2">Arah haluan dan komitmen pendidikan Pondok Pesantren Damanhuri Romly</p>
    </div>
</div>

<div class="py-12 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
    <!-- Visi Card -->
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-sm">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-[#14532D] flex items-center justify-center font-bold">
                <svg class="w-5 h-5 text-[#C6A55C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </div>
            <h2 class="text-xl font-bold text-[#14532D]">Visi Pesantren</h2>
        </div>
        <p class="text-stone-700 text-sm sm:text-base leading-relaxed pl-13">
            {{ $vision ?? 'Mencetak generasi santri yang berakhlakul karimah, berilmu luas, dan mandiri.' }}
        </p>
    </div>

    <!-- Misi Card -->
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-sm">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-[#14532D] flex items-center justify-center font-bold">
                <svg class="w-5 h-5 text-[#C6A55C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
            <h2 class="text-xl font-bold text-[#14532D]">Misi Pesantren</h2>
        </div>
        <div class="text-stone-700 text-sm sm:text-base leading-relaxed pl-13 whitespace-pre-line space-y-2">
            {{ $mission }}
        </div>
    </div>
</div>
@endsection
