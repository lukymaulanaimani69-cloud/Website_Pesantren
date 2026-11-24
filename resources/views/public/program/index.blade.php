@extends('layouts.public')

@section('title', 'Program Pendidikan')

@section('content')
<div class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#14532D] tracking-tight">Program Pendidikan</h1>
        <p class="text-xs sm:text-sm text-stone-500 mt-2">Pilihan kurikulum kepesantrenan dan formal terpadu</p>
    </div>
</div>

<div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($programs as $program)
            <div class="bg-white rounded-2xl border border-stone-200 shadow-sm p-6 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <span class="inline-block px-2.5 py-1 rounded-md bg-emerald-50 text-[#287D52] font-semibold text-xs mb-3">
                        Program Unggulan
                    </span>
                    <h2 class="text-xl font-bold text-[#14532D] mb-2">{{ $program->name }}</h2>
                    <p class="text-xs text-stone-600 leading-relaxed">{{ $program->summary }}</p>
                </div>
                <div class="mt-6 pt-4 border-t border-stone-100 flex items-center justify-between">
                    <a href="{{ route('program.show', $program->slug) }}" class="text-xs font-semibold text-[#287D52] hover:text-[#14532D]">
                        Lihat Kurikulum Lengkap &rarr;
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-12 text-stone-500 text-xs">
                Belum ada data program pendidikan yang diterbitkan.
            </div>
        @endforelse
    </div>
</div>
@endsection
