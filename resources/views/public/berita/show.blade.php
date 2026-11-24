@extends('layouts.public')

@section('title', $post->title)
@section('meta_description', Str::limit(strip_tags($post->summary ?? $post->body), 150))

@section('content')
<div class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-xs text-stone-500 mb-6">
            <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
            <span>/</span>
            <a href="{{ route('berita.index') }}" class="hover:underline">Berita</a>
            <span>/</span>
            <span class="text-stone-800 font-semibold truncate">{{ $post->title }}</span>
        </nav>

        <div class="flex items-center gap-3 text-xs text-stone-500 mb-3">
            <span class="px-2.5 py-0.5 rounded-md bg-emerald-50 text-[#287D52] font-semibold">
                {{ $post->category?->name ?? 'Warta' }}
            </span>
            <span>&bull;</span>
            <span>Dipublikasikan: {{ $post->published_at?->translatedFormat('d F Y') }}</span>
        </div>

        <h1 class="text-2xl sm:text-4xl font-extrabold text-[#14532D] tracking-tight leading-snug">
            {{ $post->title }}
        </h1>
    </div>
</div>

<div class="py-12 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <article class="bg-white rounded-2xl p-6 sm:p-10 border border-stone-200 shadow-sm space-y-6">
        @if($post->image_url)
            <div class="rounded-2xl overflow-hidden aspect-video w-full bg-stone-100 shadow-sm">
                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            </div>
        @endif

        @if($post->summary)
            <p class="text-stone-600 text-sm font-medium italic border-l-4 border-[#287D52] pl-4 py-1">
                {{ $post->summary }}
            </p>
        @endif

        <div class="prose max-w-none text-stone-700 text-sm leading-relaxed space-y-4">
            {!! $post->body !!}
        </div>

        <div class="pt-8 border-t border-stone-200 flex flex-wrap items-center justify-between gap-4 text-xs text-stone-500">
            <div>
                <span>Penulis: <strong>{{ $post->author?->name ?? 'Redaksi Humas Pesantren' }}</strong></span>
            </div>
            <a href="{{ route('berita.index') }}" class="text-[#287D52] font-semibold hover:underline">
                &larr; Kembali ke Daftar Berita
            </a>
        </div>
    </article>

    @if($recentPosts->isNotEmpty())
        <div class="mt-12">
            <h2 class="text-lg font-bold text-[#14532D] mb-6">Berita Terkait Lainnya</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach($recentPosts as $item)
                    <div class="bg-white rounded-xl p-5 border border-stone-200 shadow-xs">
                        <span class="text-[11px] text-stone-400 block mb-1">{{ $item->published_at?->translatedFormat('d M Y') }}</span>
                        <h3 class="font-bold text-sm text-[#14532D] hover:underline mb-1">
                            <a href="{{ route('berita.show', $item->slug) }}">{{ $item->title }}</a>
                        </h3>
                        <p class="text-xs text-stone-500 line-clamp-2">{{ $item->summary }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
