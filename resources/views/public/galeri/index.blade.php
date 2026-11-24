@extends('layouts.public')

@section('title', 'Galeri Dokumentasi')

@section('content')
<div class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#14532D] tracking-tight">Galeri Dokumentasi</h1>
        <p class="text-xs sm:text-sm text-stone-500 mt-2">Album foto kegiatan harian, pengajian, dan peringatan hari besar Islam</p>
    </div>
</div>

<div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($galleries as $gallery)
            <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-md transition">
                <div class="p-6">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-[#14532D] flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-[#C6A55C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <h2 class="font-bold text-base text-[#14532D] mb-2">{{ $gallery->title }}</h2>
                    <p class="text-xs text-stone-600 line-clamp-3 leading-relaxed">{{ $gallery->description }}</p>
                </div>
                <div class="px-6 pb-6 pt-2 border-t border-stone-100 flex items-center justify-between text-xs">
                    <span class="text-stone-400">{{ $gallery->media->count() }} Foto</span>
                    <a href="{{ route('galeri.show', $gallery->slug) }}" class="font-semibold text-[#287D52] hover:underline">
                        Buka Album &rarr;
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-12 text-stone-500 text-xs">
                Belum ada album galeri yang dipublikasikan.
            </div>
        @endforelse
    </div>
</div>
@endsection
