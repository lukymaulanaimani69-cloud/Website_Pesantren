@extends('layouts.admin')

@section('header_title', 'Log Aktivitas & Audit Keamanan')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-2xl p-5 border border-stone-200 shadow-xs flex items-center justify-between">
        <form method="GET" action="{{ route('admin.audit-logs.index') }}" class="flex items-center gap-3">
            <input type="text" name="cari" value="{{ $search }}" placeholder="Cari aktivitas atau alamat IP..." class="px-3.5 py-2 rounded-xl border border-stone-300 text-xs w-64 focus:ring-2 focus:ring-[#287D52]">
            <button type="submit" class="px-4 py-2 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324] transition">
                Cari
            </button>
            @if($search)
                <a href="{{ route('admin.audit-logs.index') }}" class="text-xs text-stone-500 hover:text-stone-800 underline">Reset</a>
            @endif
        </form>
    </div>

    <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="text-stone-500 bg-stone-50 border-b border-stone-200 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Waktu Kejadian</th>
                        <th class="px-6 py-3">Pelaku (Aktor)</th>
                        <th class="px-6 py-3">Aksi / Tindakan</th>
                        <th class="px-6 py-3">Target / Entitas</th>
                        <th class="px-6 py-3">Alamat IP</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($logs as $log)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4 text-stone-500 font-mono">
                                {{ $log->created_at->translatedFormat('d M Y H:i:s') }}
                            </td>
                            <td class="px-6 py-4">
                                <strong class="text-stone-800 block">{{ $log->actor?->name ?? 'Sistem Otomatis' }}</strong>
                                <span class="text-stone-400 font-mono text-[10px]">{{ $log->actor?->email }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-2 py-0.5 rounded-md bg-stone-100 font-mono text-stone-700 font-semibold text-[10px]">
                                    {{ $log->action }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-stone-600">
                                {{ class_basename($log->auditable_type ?? '-') }} #{{ $log->auditable_id ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-stone-500 font-mono">
                                {{ $log->ip_address ?? '127.0.0.1' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-stone-400">
                                Belum ada riwayat aktivitas yang tercatat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($logs->hasPages())
            <div class="px-6 py-4 border-t border-stone-100">
                {{ $logs->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
