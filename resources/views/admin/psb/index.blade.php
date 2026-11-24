@extends('layouts.admin')

@section('header_title', 'Verifikasi & Seleksi Berkas PSB')

@section('content')
<div class="space-y-6">
    <!-- Filter & Search Bar -->
    <div class="bg-white rounded-2xl p-5 border border-stone-200 shadow-xs flex flex-col md:flex-row items-center justify-between gap-4">
        <form method="GET" action="{{ route('admin.psb.index') }}" class="flex flex-wrap items-center gap-3 w-full md:w-auto">
            <input type="text" name="cari" value="{{ $search }}" placeholder="Cari nama / nomor pendaftaran..." class="px-3.5 py-2 rounded-xl border border-stone-300 text-xs w-full sm:w-64 focus:ring-2 focus:ring-[#287D52]">
            
            <select name="status" class="px-3 py-2 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-[#287D52]">
                <option value="">Semua Status</option>
                @foreach($statuses as $st)
                    <option value="{{ $st->value }}" {{ $status === $st->value ? 'selected' : '' }}>{{ $st->label() }}</option>
                @endforeach
            </select>

            <select name="periode" class="px-3 py-2 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-[#287D52]">
                <option value="">Semua Gelombang</option>
                @foreach($periods as $prd)
                    <option value="{{ $prd->id }}" {{ $periodId == $prd->id ? 'selected' : '' }}>{{ $prd->name }}</option>
                @endforeach
            </select>

            <button type="submit" class="px-4 py-2 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324] transition">
                Filter
            </button>
            @if($search || $status || $periodId)
                <a href="{{ route('admin.psb.index') }}" class="text-xs text-stone-500 hover:text-stone-800 underline">Reset</a>
            @endif
        </form>

        <a href="{{ route('admin.psb.periods.index') }}" class="px-4 py-2 rounded-xl border border-[#14532D] text-[#14532D] text-xs font-semibold hover:bg-emerald-50 transition shrink-0">
            Kelola Periode & Kuota
        </a>
    </div>

    <!-- Table of Registrations -->
    <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="text-stone-500 bg-stone-50 border-b border-stone-200 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3">No. Pendaftaran</th>
                        <th class="px-6 py-3">Nama Calon Santri</th>
                        <th class="px-6 py-3">Wali & Kontak</th>
                        <th class="px-6 py-3">Gelombang / Periode</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Tanggal Daftar</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($registrations as $reg)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4 font-mono font-semibold text-[#14532D]">
                                {{ $reg->registration_number ?? 'DRAF' }}
                            </td>
                            <td class="px-6 py-4">
                                <strong class="text-stone-800 block">{{ $reg->student_name }}</strong>
                                <span class="text-stone-400 text-[10px]">{{ $reg->gender === 'L' ? 'Laki-laki' : 'Perempuan' }} &bull; Program: {{ $reg->chosen_program ?? '-' }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-stone-700 block">{{ $reg->guardian_name }}</span>
                                <span class="text-stone-500 font-mono text-[10px]">{{ $reg->guardian_contact }}</span>
                            </td>
                            <td class="px-6 py-4 text-stone-600">
                                {{ $reg->period?->name ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-semibold border {{ $reg->status->badgeClass() }}">
                                    {{ $reg->status->label() }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-stone-500">
                                {{ $reg->created_at->translatedFormat('d M Y H:i') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.psb.show', $reg) }}" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-emerald-100 text-emerald-800 hover:bg-emerald-200 font-semibold text-xs transition">
                                    Verifikasi & Berkas &rarr;
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-stone-400 text-xs">
                                Tidak ada data pendaftar yang sesuai filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($registrations->hasPages())
            <div class="px-6 py-4 border-t border-stone-100">
                {{ $registrations->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
