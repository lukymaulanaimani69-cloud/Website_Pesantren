@extends('layouts.admin')

@section('header_title', 'Kelola Periode & Gelombang PSB')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.psb.periods.create') }}" class="px-4 py-2 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324] transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Buka Gelombang Baru</span>
        </a>

        <a href="{{ route('admin.psb.index') }}" class="text-xs text-stone-500 hover:text-stone-800 font-semibold">
            &larr; Kembali ke Verifikasi Pendaftar
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="text-stone-500 bg-stone-50 border-b border-stone-200 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Nama Gelombang</th>
                        <th class="px-6 py-3">Tahun Ajaran</th>
                        <th class="px-6 py-3">Jadwal Buka - Tutup</th>
                        <th class="px-6 py-3">Pendaftar</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($periods as $period)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4 font-semibold text-stone-800">
                                {{ $period->name }}
                            </td>
                            <td class="px-6 py-4 text-stone-600 font-mono">
                                {{ $period->academic_year ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-stone-600">
                                {{ $period->opens_at->translatedFormat('d M Y') }} s/d {{ $period->closes_at->translatedFormat('d M Y') }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-[#14532D]">
                                {{ $period->registrations_count }} Santri
                            </td>
                            <td class="px-6 py-4">
                                @if($period->is_active)
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">
                                        Aktif Berjalan
                                    </span>
                                @else
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-stone-100 text-stone-600 border border-stone-200">
                                        Ditutup
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.psb.periods.edit', $period) }}" class="text-emerald-700 hover:text-emerald-900 font-semibold text-xs">
                                    Edit Gelombang
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-stone-400">
                                Belum ada gelombang PSB yang terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
