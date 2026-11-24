@extends('layouts.admin')

@section('header_title', 'Kelola Tanya Jawab (FAQ)')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <a href="{{ route('admin.faqs.create') }}" class="px-4 py-2 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324] transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Tanya Jawab (FAQ)</span>
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="text-stone-500 bg-stone-50 border-b border-stone-200 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Pertanyaan</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($faqs as $faq)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4 font-semibold text-stone-800 max-w-md truncate">{{ $faq->question }}</td>
                            <td class="px-6 py-4 text-stone-600">{{ $faq->category ?? 'Umum' }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-semibold {{ $faq->is_published ? 'bg-emerald-100 text-emerald-800' : 'bg-stone-100 text-stone-600' }}">
                                    {{ $faq->is_published ? 'Tampil' : 'Sembunyi' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.faqs.edit', $faq) }}" class="text-[#287D52] hover:underline font-semibold">Ubah</a>
                                <span>&bull;</span>
                                <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="inline" onsubmit="return confirm('Hapus tanya jawab ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:underline font-semibold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-stone-400">Belum ada FAQ tersimpan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
