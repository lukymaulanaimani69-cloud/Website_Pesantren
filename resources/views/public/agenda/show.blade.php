@extends('layouts.public')

@section('title', $event->title)

@section('content')
<div class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-xs text-stone-500 mb-6">
            <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
            <span>/</span>
            <a href="{{ route('agenda.index') }}" class="hover:underline">Agenda</a>
            <span>/</span>
            <span class="text-stone-800 font-semibold">{{ $event->title }}</span>
        </nav>

        <h1 class="text-2xl sm:text-4xl font-extrabold text-[#14532D] tracking-tight">{{ $event->title }}</h1>
    </div>
</div>

<div class="py-12 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-2xl p-6 sm:p-10 border border-stone-200 shadow-sm space-y-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-4 rounded-xl bg-stone-50 border border-stone-200 text-xs">
            <div>
                <strong class="text-stone-700 block">Waktu Pelaksanaan:</strong>
                <span>{{ $event->start_at->translatedFormat('l, d F Y - H:i') }} WIB</span>
            </div>
            <div>
                <strong class="text-stone-700 block">Lokasi:</strong>
                <span>{{ $event->location_text ?? 'Kampus Pondok Pesantren' }}</span>
            </div>
        </div>

        <div class="text-stone-700 text-sm leading-relaxed whitespace-pre-line">
            {{ $event->description }}
        </div>

        <div class="pt-6 border-t border-stone-200">
            <a href="{{ route('agenda.index') }}" class="text-xs font-semibold text-[#287D52] hover:underline">
                &larr; Kembali ke Daftar Agenda
            </a>
        </div>
    </div>
</div>
@endsection
