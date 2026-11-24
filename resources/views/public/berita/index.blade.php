@extends('layouts.public')

@section('title', 'Berita & Pengumuman')

@section('content')
<div class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#14532D] tracking-tight">Berita & Informasi</h1>
        <p class="text-xs sm:text-sm text-stone-500 mt-2">Seputar dinamika, prestasi santri, dan pengumuman resmi pesantren</p>
    </div>
</div>

<div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Filter Kategori & Pencarian -->
    <div class="bg-white rounded-2xl p-4 border border-stone-200 shadow-sm mb-8 flex flex-col sm:flex-row justify-between items-center gap-4">
        <div class="flex items-center gap-2 overflow-x-auto w-full sm:w-auto pb-2 sm:pb-0 text-xs">
            <a href="{{ route('berita.index') }}" class="px-3.5 py-2 rounded-xl transition whitespace-nowrap {{ !$categorySlug ? 'bg-[#14532D] text-white font-semibold' : 'bg-stone-100 text-stone-600 hover:bg-stone-200' }}">
                Semua Kategori
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('berita.index', ['kategori' => $cat->slug]) }}" class="px-3.5 py-2 rounded-xl transition whitespace-nowrap {{ $categorySlug === $cat->slug ? 'bg-[#14532D] text-white font-semibold' : 'bg-stone-100 text-stone-600 hover:bg-stone-200' }}">
                    {{ $cat->name }} ({{ $cat->posts_count }})
                </a>
            @endforeach
        </div>

        <form action="{{ route('berita.index') }}" method="GET" class="w-full sm:w-72 flex gap-2">
            @if($categorySlug)
                <input type="hidden" name="kategori" value="{{ $categorySlug }}">
            @endif
            <input type="text" name="cari" value="{{ $search }}" placeholder="Cari berita..."
                class="w-full px-3 py-1.5 rounded-xl border border-stone-300 text-xs text-stone-800 focus:ring-2 focus:ring-[#287D52] focus:border-transparent">
            <button type="submit" class="px-3 py-1.5 rounded-xl bg-[#287D52] text-white text-xs font-semibold hover:bg-[#14532D] transition">
                Cari
            </button>
        </form>
    </div>

    <!-- Daftar Berita -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($posts as $post)
            <article class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-md transition group">
                <div>
                    @if($post->image_url)
                        <a href="{{ route('berita.show', $post->slug) }}" class="block aspect-video w-full overflow-hidden bg-stone-100">
                            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </a>
                    @else
                        <a href="{{ route('berita.show', $post->slug) }}" class="block aspect-video w-full bg-gradient-to-br from-[#14532D]/10 to-[#287D52]/15 flex items-center justify-center text-stone-400 group-hover:bg-[#14532D]/15 transition">
                            <svg class="w-12 h-12 text-[#287D52]/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        </a>
                    @endif
                    <div class="p-6">
                        <div class="flex items-center justify-between text-[11px] text-stone-500 mb-2">
                            <span class="font-semibold text-[#287D52] bg-emerald-50 px-2.5 py-0.5 rounded-md">
                                {{ $post->category?->name ?? 'Warta' }}
                            </span>
                            <span>{{ $post->published_at?->translatedFormat('d M Y') }}</span>
                        </div>
                        <h2 class="font-bold text-base text-[#14532D] group-hover:text-[#287D52] transition mb-2 line-clamp-2">
                            <a href="{{ route('berita.show', $post->slug) }}">{{ $post->title }}</a>
                        </h2>
                        <p class="text-xs text-stone-600 line-clamp-3 leading-relaxed">
                            {{ $post->summary }}
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-2">
                    <a href="{{ route('berita.show', $post->slug) }}" class="text-xs font-semibold text-[#287D52] hover:underline inline-flex items-center gap-1">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </article>
        @empty
            <div class="col-span-3 text-center py-12 text-stone-500 text-xs">
                Tidak ada artikel atau pengumuman yang sesuai kriteria pencarian.
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-10">
        {{ $posts->links() }}
    </div>
</div>
@endsection
