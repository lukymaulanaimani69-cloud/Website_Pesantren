@extends('layouts.admin')

@section('header_title', 'Detail Pesan Masuk')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-xs space-y-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 pb-4 border-b border-stone-100">
            <div>
                <h2 class="text-lg font-bold text-[#14532D]">{{ $message->subject }}</h2>
                <span class="text-xs text-stone-500">Dari: <strong>{{ $message->name }}</strong> ({{ $message->contact }})</span>
            </div>
            <span class="text-xs text-stone-400">{{ $message->created_at->translatedFormat('l, d F Y H:i') }}</span>
        </div>

        <div class="bg-stone-50 rounded-xl p-5 border border-stone-200 text-sm text-stone-700 leading-relaxed whitespace-pre-line">
            {{ $message->message }}
        </div>

        <form action="{{ route('admin.messages.mark-replied', $message) }}" method="POST" class="pt-4 border-t border-stone-100 space-y-4">
            @csrf
            <div>
                <label for="admin_notes" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Catatan Tindak Lanjut Admin / Petugas</label>
                <textarea name="admin_notes" id="admin_notes" rows="3"
                    class="w-full px-3 py-2 rounded-xl border border-stone-300 text-stone-800 text-xs"
                    placeholder="Tuliskan catatan bagaimana pesan ini ditangani (misal: telah dihubungi via WA)...">{{ $message->admin_notes }}</textarea>
            </div>
            <div class="flex items-center justify-between">
                <a href="{{ route('admin.messages.index') }}" class="text-xs text-[#287D52] hover:underline font-semibold">&larr; Kembali ke Daftar Pesan</a>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324]">
                    Tandai Telah Ditangani / Dibalas
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
