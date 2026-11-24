@extends('layouts.admin')

@section('header_title', 'Kelola Berita & Artikel')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.posts.create') }}" class="px-4 py-2 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324] transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>Tulis Berita Baru</span>
            </a>
        </div>

        <form action="{{ route('admin.posts.index') }}" method="GET" class="flex items-center gap-2 w-full sm:w-auto">
            <select name="status" onchange="this.form.submit()" class="px-3 py-1.5 rounded-xl border border-stone-300 text-xs text-stone-800">
                <option value="">Semua Status</option>
                <option value="published" {{ $status === 'published' ? 'selected' : '' }}>Terbit (Published)</option>
                <option value="draft" {{ $status === 'draft' ? 'selected' : '' }}>Draf (Draft)</option>
                <option value="archived" {{ $status === 'archived' ? 'selected' : '' }}>Arsip</option>
            </select>
            <input type="text" name="cari" value="{{ $search }}" placeholder="Cari judul..." class="px-3 py-1.5 rounded-xl border border-stone-300 text-xs text-stone-800">
            <button type="submit" class="px-3 py-1.5 rounded-xl bg-stone-800 text-white text-xs font-semibold">Cari</button>
        </form>
    </div>

    <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="text-stone-500 bg-stone-50 border-b border-stone-200 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Judul Berita</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Penulis</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Tanggal Terbit</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($posts as $post)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4 font-semibold text-stone-800">
                                <div class="flex items-center gap-3">
                                    @if($post->image_url)
                                        <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-10 h-10 rounded-lg object-cover shrink-0 border border-stone-200 shadow-2xs">
                                    @else
                                        <div class="w-10 h-10 rounded-lg bg-stone-100 flex items-center justify-center shrink-0 text-stone-400 border border-stone-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                    @endif
                                    <span class="max-w-xs truncate block font-medium">{{ $post->title }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-stone-600">
                                {{ $post->category?->name ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-stone-600">
                                {{ $post->author?->name ?? 'Admin' }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-semibold {{ $post->status === 'published' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                                    {{ ucfirst($post->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-stone-500">
                                {{ $post->published_at ? $post->published_at->format('d/m/Y H:i') : '-' }}
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.posts.edit', $post) }}" class="text-[#287D52] hover:underline font-semibold">Ubah</a>
                                <span>&bull;</span>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:underline font-semibold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-stone-400">
                                Belum ada berita atau artikel yang tersimpan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-stone-100">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
