@extends('layouts.admin')

@section('header_title', 'Kelola Agenda Kegiatan')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <a href="{{ route('admin.events.create') }}" class="px-4 py-2 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324] transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Agenda Baru</span>
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="text-stone-500 bg-stone-50 border-b border-stone-200 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Judul Acara</th>
                        <th class="px-6 py-3">Waktu Pelaksanaan</th>
                        <th class="px-6 py-3">Lokasi</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($events as $event)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4 font-semibold text-stone-800">{{ $event->title }}</td>
                            <td class="px-6 py-4 text-stone-600">{{ $event->start_at->translatedFormat('d M Y - H:i') }}</td>
                            <td class="px-6 py-4 text-stone-600">{{ $event->location_text ?? '-' }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-semibold {{ $event->status === 'published' ? 'bg-emerald-100 text-emerald-800' : 'bg-stone-100 text-stone-600' }}">
                                    {{ ucfirst($event->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.events.edit', $event) }}" class="text-[#287D52] hover:underline font-semibold">Ubah</a>
                                <span>&bull;</span>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline" onsubmit="return confirm('Hapus acara ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:underline font-semibold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-stone-400">Belum ada agenda kegiatan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-stone-100">
            {{ $events->links() }}
        </div>
    </div>
</div>
@endsection
