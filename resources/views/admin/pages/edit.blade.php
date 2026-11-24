@extends('layouts.admin')

@section('header_title', 'Ubah Halaman ' . $page->title)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-xs">
        <form action="{{ route('admin.pages.update', $page) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="title" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Judul Halaman</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $page->title) }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52]">
                </div>
                <div>
                    <label for="status" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Status Publikasi</label>
                    <select name="status" id="status" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm">
                        <option value="published" {{ old('status', $page->status) === 'published' ? 'selected' : '' }}>Terbitkan</option>
                        <option value="draft" {{ old('status', $page->status) === 'draft' ? 'selected' : '' }}>Draf</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="body" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Konten Halaman (HTML / Teks)</label>
                <textarea name="body" id="body" rows="12"
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm font-sans focus:ring-2 focus:ring-[#287D52]">{{ old('body', $page->body) }}</textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-stone-100">
                <a href="{{ route('admin.pages.index') }}" class="px-5 py-2.5 rounded-xl border border-stone-300 text-stone-700 text-xs font-semibold">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324]">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
