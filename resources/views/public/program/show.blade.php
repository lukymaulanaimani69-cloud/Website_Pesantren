@extends('layouts.public')

@section('title', $program->name)

@section('content')
<div class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-xs text-stone-500 mb-6">
            <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
            <span>/</span>
            <a href="{{ route('program.index') }}" class="hover:underline">Program</a>
            <span>/</span>
            <span class="text-stone-800 font-semibold">{{ $program->name }}</span>
        </nav>

        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#14532D] tracking-tight">{{ $program->name }}</h1>
        <p class="text-xs sm:text-sm text-stone-500 mt-2">{{ $program->summary }}</p>
    </div>
</div>

<div class="py-12 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-2xl p-6 sm:p-10 border border-stone-200 shadow-sm space-y-6">
        <div class="prose max-w-none text-stone-700 text-sm leading-relaxed">
            {!! $program->body ?? '<p>' . e($program->summary) . '</p>' !!}
        </div>

        <div class="pt-6 border-t border-stone-200 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div>
                <strong class="text-xs font-bold text-stone-800 block">Tertarik mendaftar pada program ini?</strong>
                <span class="text-[11px] text-stone-500">Pendaftaran santri baru dapat dilakukan langsung melalui portal PSB daring.</span>
            </div>
            <a href="{{ route('psb.info') }}" class="px-5 py-2.5 rounded-xl bg-[#14532D] text-white font-semibold text-xs hover:bg-[#114324] transition">
                Daftar Sekarang
            </a>
        </div>
    </div>
</div>
@endsection
