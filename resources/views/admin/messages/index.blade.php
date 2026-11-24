@extends('layouts.admin')

@section('header_title', 'Pesan Kontak Masuk')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div class="flex items-center gap-2 text-xs">
            <a href="{{ route('admin.messages.index') }}" class="px-3 py-1.5 rounded-xl {{ !$status ? 'bg-[#14532D] text-white font-semibold' : 'bg-white border text-stone-600' }}">Semua</a>
            <a href="{{ route('admin.messages.index', ['status' => 'unread']) }}" class="px-3 py-1.5 rounded-xl {{ $status === 'unread' ? 'bg-[#14532D] text-white font-semibold' : 'bg-white border text-stone-600' }}">Belum Dibaca</a>
            <a href="{{ route('admin.messages.index', ['status' => 'replied']) }}" class="px-3 py-1.5 rounded-xl {{ $status === 'replied' ? 'bg-[#14532D] text-white font-semibold' : 'bg-white border text-stone-600' }}">Selesai / Dibalas</a>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="text-stone-500 bg-stone-50 border-b border-stone-200 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Pengirim</th>
                        <th class="px-6 py-3">Kontak</th>
                        <th class="px-6 py-3">Subjek</th>
                        <th class="px-6 py-3">Waktu</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($messages as $msg)
                        <tr class="hover:bg-stone-50 transition {{ $msg->status === 'unread' ? 'font-bold bg-emerald-50/30' : '' }}">
                            <td class="px-6 py-4 text-stone-800">{{ $msg->name }}</td>
                            <td class="px-6 py-4 text-stone-600 font-mono">{{ $msg->contact }}</td>
                            <td class="px-6 py-4 text-stone-800 max-w-xs truncate">{{ $msg->subject }}</td>
                            <td class="px-6 py-4 text-stone-500">{{ $msg->created_at->translatedFormat('d M Y H:i') }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-semibold {{ $msg->status === 'unread' ? 'bg-rose-100 text-rose-800' : ($msg->status === 'replied' ? 'bg-emerald-100 text-emerald-800' : 'bg-stone-100 text-stone-600') }}">
                                    {{ ucfirst($msg->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.messages.show', $msg) }}" class="text-[#287D52] hover:underline font-semibold">Buka Pesan</a>
                                <span>&bull;</span>
                                <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" class="inline" onsubmit="return confirm('Hapus pesan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:underline font-semibold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-stone-400">Belum ada pesan kontak masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-stone-100">
            {{ $messages->links() }}
        </div>
    </div>
</div>
@endsection
