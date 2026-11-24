@extends('layouts.admin')

@section('header_title', 'Ubah Fasilitas')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-xs">
        <form action="{{ route('admin.facilities.update', $facility) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Nama Fasilitas</label>
                <input type="text" name="name" id="name" value="{{ old('name', $facility->name) }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52]">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="sort_order" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Nomor Urutan</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $facility->sort_order) }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52]">
                </div>
                <div>
                    <label for="is_published" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Status Tampil</label>
                    <select name="is_published" id="is_published" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm">
                        <option value="1" {{ old('is_published', $facility->is_published) ? 'selected' : '' }}>Tampilkan ke Publik</option>
                        <option value="0" {{ !old('is_published', $facility->is_published) ? 'selected' : '' }}>Sembunyikan</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="description" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Deskripsi Fasilitas</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm">{{ old('description', $facility->description) }}</textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-stone-100">
                <a href="{{ route('admin.facilities.index') }}" class="px-5 py-2.5 rounded-xl border border-stone-300 text-stone-700 text-xs font-semibold">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324]">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
