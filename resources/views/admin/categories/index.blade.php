@extends('layouts.admin')

@section('header_title', 'Kategori Berita')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Form Tambah Kategori -->
    <div class="bg-white rounded-2xl p-6 border border-stone-200 shadow-xs h-fit">
        <h2 class="text-sm font-bold text-[#14532D] uppercase tracking-wider mb-4">Tambah Kategori Baru</h2>
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Nama Kategori</label>
                <input type="text" name="name" id="name" required
                    class="w-full px-3 py-2 rounded-xl border border-stone-300 text-stone-800 text-xs focus:ring-2 focus:ring-[#287D52] focus:border-transparent">
            </div>

            <div>
                <label for="description" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Deskripsi Singkat</label>
                <textarea name="description" id="description" rows="2"
                    class="w-full px-3 py-2 rounded-xl border border-stone-300 text-stone-800 text-xs focus:ring-2 focus:ring-[#287D52] focus:border-transparent"></textarea>
            </div>

            <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324] transition">
                Simpan Kategori
            </button>
        </form>
    </div>

    <!-- Tabel Daftar Kategori -->
    <div class="lg:col-span-2 bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="text-stone-500 bg-stone-50 border-b border-stone-200 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Nama Kategori</th>
                        <th class="px-6 py-3">Slug</th>
                        <th class="px-6 py-3">Jumlah Berita</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($categories as $category)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4 font-semibold text-stone-800">{{ $category->name }}</td>
                            <td class="px-6 py-4 font-mono text-stone-500">{{ $category->slug }}</td>
                            <td class="px-6 py-4 text-stone-600">{{ $category->posts_count }} Berita</td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:underline font-semibold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-stone-400">
                                Belum ada kategori tersimpan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
