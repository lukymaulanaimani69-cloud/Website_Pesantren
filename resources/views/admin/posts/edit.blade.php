@extends('layouts.admin')

@section('header_title', 'Ubah Berita')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-xs">
        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Judul Berita</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52] focus:border-transparent">
                @error('title')
                    <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="category_id" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Kategori</label>
                    <select name="category_id" id="category_id" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm">
                        <option value="">Pilih Kategori...</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $post->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="status" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Status Publikasi</label>
                    <select name="status" id="status" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm">
                        <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>Draf (Hanya Admin)</option>
                        <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>Terbitkan (Tampil ke Publik)</option>
                        <option value="archived" {{ old('status', $post->status) === 'archived' ? 'selected' : '' }}>Arsipkan</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="summary" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Ringkasan / Sinopsis Singkat</label>
                <textarea name="summary" id="summary" rows="2"
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52] focus:border-transparent">{{ old('summary', $post->summary) }}</textarea>
            </div>

            <div>
                <label for="body" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Isi Berita Lengkap</label>
                <textarea name="body" id="body" rows="10" required
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm font-sans focus:ring-2 focus:ring-[#287D52] focus:border-transparent">{{ old('body', $post->body) }}</textarea>
            </div>

            <div>
                <label for="featured_image" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Ganti Foto Sampul (Opsional, Maks 5 MB)</label>
                <input type="file" name="featured_image" id="featured_image" accept="image/*"
                    class="w-full text-xs text-stone-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-[#14532D] hover:file:bg-emerald-100">
                @if($post->image_url)
                    <div class="mt-2 flex items-center gap-3">
                        <img src="{{ $post->image_url }}" alt="Preview" class="w-16 h-12 object-cover rounded-lg border border-stone-200 shadow-2xs">
                        <p class="text-[11px] text-stone-500">Saat ini: <a href="{{ $post->image_url }}" target="_blank" class="text-[#287D52] underline font-medium">Lihat Foto Sampul</a></p>
                    </div>
                @endif
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-stone-100">
                <a href="{{ route('admin.posts.index') }}" class="px-5 py-2.5 rounded-xl border border-stone-300 text-stone-700 text-xs font-semibold hover:bg-stone-50">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324] transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
