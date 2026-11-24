@extends('layouts.public')

@section('title', 'Fasilitas & Sarana Prasarana')

@section('content')
<div class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#14532D] tracking-tight">Fasilitas Pesantren</h1>
        <p class="text-xs sm:text-sm text-stone-500 mt-2">Sarana dan prasarana penunjang kegiatan ibadah, belajar, dan kenyamanan santri</p>
    </div>
</div>

<div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @forelse($facilities as $facility)
            <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-sm flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-xl bg-emerald-50 text-[#14532D] flex items-center justify-center font-bold">
                            <svg class="w-5 h-5 text-[#C6A55C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <h2 class="text-lg font-bold text-[#14532D]">{{ $facility->name }}</h2>
                    </div>
                    <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">{{ $facility->description }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-2 text-center py-12 text-stone-500 text-xs">
                Informasi fasilitas pesantren sedang diperbarui.
            </div>
        @endforelse
    </div>
</div>
@endsection
