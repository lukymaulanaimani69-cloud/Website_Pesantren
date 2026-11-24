@extends('layouts.public')

@section('title', $gallery->title)

@section('content')
<div class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-xs text-stone-500 mb-6">
            <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
            <span>/</span>
            <a href="{{ route('galeri.index') }}" class="hover:underline">Galeri</a>
            <span>/</span>
            <span class="text-stone-800 font-semibold truncate">{{ $gallery->title }}</span>
        </nav>

        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#14532D] tracking-tight">{{ $gallery->title }}</h1>
        <p class="text-xs sm:text-sm text-stone-500 mt-2">{{ $gallery->description }}</p>
    </div>
</div>

<div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($gallery->media as $item)
            <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-xs">
                <div class="h-48 bg-stone-100 flex items-center justify-center text-stone-400">
                    @if($item->url)
                        <img src="{{ $item->url }}" alt="{{ $item->caption }}" class="w-full h-full object-cover">
                    @else
                        <span class="text-xs">Foto Dokumentasi</span>
                    @endif
                </div>
                @if($item->caption)
                    <div class="p-3 text-xs text-stone-700 bg-stone-50">
                        {{ $item->caption }}
                    </div>
                @endif
            </div>
        @empty
            <div class="col-span-3 text-center py-12 text-stone-500 text-xs">
                Album ini belum memiliki foto yang diunggah.
            </div>
        @endforelse
    </div>
</div>
@endsection
