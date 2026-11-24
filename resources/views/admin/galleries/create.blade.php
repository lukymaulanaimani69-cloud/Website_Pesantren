@extends('layouts.admin')

@section('header_title', 'Buat Album Galeri Baru')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-xs">
        <form action="{{ route('admin.galleries.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="title" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Nama / Judul Album</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52]">
            </div>

            <div>
                <label for="status" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Status Publikasi</label>
                <select name="status" id="status" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm">
                    <option value="published">Terbitkan (Tampil)</option>
                    <option value="draft">Draf (Sembunyikan)</option>
                </select>
            </div>

            <div>
                <label for="description" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Deskripsi Album</label>
                <textarea name="description" id="description" rows="3"
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm">{{ old('description') }}</textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-stone-100">
                <a href="{{ route('admin.galleries.index') }}" class="px-5 py-2.5 rounded-xl border border-stone-300 text-stone-700 text-xs font-semibold">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324]">Simpan Album</button>
            </div>
        </form>
    </div>
</div>
@endsection
