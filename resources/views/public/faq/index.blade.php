@extends('layouts.public')

@section('title', 'Tanya Jawab (FAQ)')

@section('content')
<div class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#14532D] tracking-tight">Tanya Jawab (FAQ)</h1>
        <p class="text-xs sm:text-sm text-stone-500 mt-2">Pertanyaan yang sering diajukan mengenai pendaftaran dan kehidupan santri</p>
    </div>
</div>

<div class="py-12 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
    @forelse($faqs as $category => $items)
        <div>
            <h2 class="text-lg font-bold text-[#14532D] mb-4 pb-2 border-b border-stone-200">
                {{ $category ?: 'Umum' }}
            </h2>
            <div class="space-y-3">
                @foreach($items as $faq)
                    <details class="group bg-white rounded-2xl border border-stone-200 p-5 shadow-xs transition">
                        <summary class="flex justify-between items-center font-semibold text-sm text-[#14532D] cursor-pointer list-none">
                            <span>{{ $faq->question }}</span>
                            <span class="transition group-open:rotate-180 text-[#287D52]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </span>
                        </summary>
                        <div class="mt-4 pt-3 border-t border-stone-100 text-xs sm:text-sm text-stone-600 leading-relaxed">
                            {{ $faq->answer }}
                        </div>
                    </details>
                @endforeach
            </div>
        </div>
    @empty
        <div class="text-center py-12 text-stone-500 text-xs">
            Belum ada daftar pertanyaan dan jawaban saat ini.
        </div>
    @endforelse
</div>
@endsection
