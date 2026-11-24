@extends('layouts.public')

@section('title', 'Agenda & Kegiatan')

@section('content')
<div class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#14532D] tracking-tight">Agenda Kegiatan</h1>
        <p class="text-xs sm:text-sm text-stone-500 mt-2">Jadwal kegiatan akademik, keagamaan, dan silaturahmi pesantren</p>
    </div>
</div>

<div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-xl font-bold text-[#14532D] mb-6">Kegiatan Mendatang</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($upcomingEvents as $event)
            <div class="bg-white rounded-2xl p-6 border border-stone-200 shadow-sm flex gap-5 items-start">
                <div class="w-16 h-16 rounded-xl bg-[#14532D] text-white flex flex-col items-center justify-center shrink-0">
                    <span class="text-xl font-bold leading-none">{{ $event->start_at->format('d') }}</span>
                    <span class="text-[10px] uppercase font-medium">{{ $event->start_at->translatedFormat('M') }}</span>
                </div>
                <div>
                    <h3 class="font-bold text-base text-[#14532D] mb-1">
                        <a href="{{ route('agenda.show', $event->slug) }}" class="hover:underline">{{ $event->title }}</a>
                    </h3>
                    <div class="flex items-center gap-2 text-xs text-stone-500 mb-2">
                        <span>Pukul {{ $event->start_at->format('H:i') }} WIB</span>
                        <span>&bull;</span>
                        <span>{{ $event->location_text }}</span>
                    </div>
                    <p class="text-xs text-stone-600 line-clamp-2 leading-relaxed">{{ $event->description }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-2 text-center py-8 text-stone-500 text-xs">
                Belum ada jadwal kegiatan mendatang yang dijadwalkan.
            </div>
        @endforelse
    </div>

    @if($pastEvents->isNotEmpty())
        <div class="mt-12">
            <h2 class="text-lg font-bold text-stone-700 mb-6">Kegiatan yang Telah Terlaksana</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($pastEvents as $past)
                    <div class="bg-white/70 rounded-xl p-4 border border-stone-200 text-xs text-stone-500 flex justify-between items-center">
                        <div>
                            <span class="font-semibold text-stone-700 block text-sm">{{ $past->title }}</span>
                            <span>{{ $past->start_at->translatedFormat('d F Y') }} - {{ $past->location_text }}</span>
                        </div>
                        <a href="{{ route('agenda.show', $past->slug) }}" class="text-[#287D52] font-semibold hover:underline">Detail</a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
