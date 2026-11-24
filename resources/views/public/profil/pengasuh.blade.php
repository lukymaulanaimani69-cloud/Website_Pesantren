@extends('layouts.public')

@section('title', 'Pengasuh & Dewan Masyayikh')

@section('content')
<div class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-xs text-stone-500 mb-6">
            <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span class="text-stone-800 font-semibold">Pengasuh</span>
        </nav>

        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#14532D] tracking-tight">Pengasuh & Dewan Guru</h1>
        <p class="text-xs sm:text-sm text-stone-500 mt-2">Masyayikh dan asatidz pembina spiritual santri</p>
    </div>
</div>

<div class="py-12 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($staff as $person)
            <div class="bg-white rounded-2xl p-6 border border-stone-200 shadow-sm flex items-start gap-4">
                <div class="w-16 h-16 rounded-xl bg-emerald-50 text-[#14532D] flex items-center justify-center font-bold text-xl shrink-0 border border-emerald-100">
                    {{ substr($person->name, 0, 1) }}
                </div>
                <div>
                    <h3 class="font-bold text-base text-[#14532D]">{{ $person->name }}</h3>
                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-100 text-emerald-800 my-1">
                        {{ $person->position }}
                    </span>
                    <p class="text-xs text-stone-600 mt-1 leading-relaxed">{{ $person->description }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-2 text-center py-8 text-stone-500 text-xs">
                Data profil pengasuh sedang dalam proses verifikasi administrasi.
            </div>
        @endforelse
    </div>
</div>
@endsection
