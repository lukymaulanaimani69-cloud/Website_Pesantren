@extends('layouts.public')

@section('title', 'Sejarah Pondok Pesantren')

@section('content')
<div class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-xs text-stone-500 mb-6">
            <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span class="text-stone-800 font-semibold">Sejarah</span>
        </nav>

        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#14532D] tracking-tight">Sejarah Pondok Pesantren</h1>
        <p class="text-xs sm:text-sm text-stone-500 mt-2">Napak tilas berdirinya Pondok Pesantren Damanhuri Romly</p>
    </div>
</div>

<div class="py-12 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-2xl p-6 sm:p-10 border border-stone-200 shadow-sm space-y-6">
        @if($page && $page->body)
            <div class="prose max-w-none text-stone-700 text-sm leading-relaxed space-y-4">
                {!! $page->body !!}
            </div>
        @elseif($historyText)
            <div class="text-stone-700 text-sm leading-relaxed whitespace-pre-line">
                {{ $historyText }}
            </div>
        @else
            <p class="text-stone-500 text-xs italic">Informasi sejarah resmi sedang dalam tahap kurasi dan pengesahan dewan pengasuh.</p>
        @endif

        <div class="p-4 rounded-xl bg-amber-50 border border-amber-200/80 text-xs text-amber-900">
            <strong>Catatan Lembaga:</strong> Narasi sejarah dan dokumen pendukung resmi senantiasa diverifikasi bersama dewan masyayikh untuk menjaga akurasi tarikh pesantren.
        </div>
    </div>
</div>
@endsection
