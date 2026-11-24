@extends('layouts.admin')

@section('header_title', 'Ubah Program Pendidikan')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-xs">
        <form action="{{ route('admin.programs.update', $program) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Nama Program</label>
                <input type="text" name="name" id="name" value="{{ old('name', $program->name) }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52]">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="sort_order" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Nomor Urutan Tampil</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $program->sort_order) }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52]">
                </div>
                <div>
                    <label for="status" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Status</label>
                    <select name="status" id="status" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm">
                        <option value="published" {{ old('status', $program->status) === 'published' ? 'selected' : '' }}>Terbit (Tampil)</option>
                        <option value="draft" {{ old('status', $program->status) === 'draft' ? 'selected' : '' }}>Draf (Sembunyikan)</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="summary" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Ringkasan Program</label>
                <textarea name="summary" id="summary" rows="2"
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm">{{ old('summary', $program->summary) }}</textarea>
            </div>

            <div>
                <label for="body" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Penjelasan Kurikulum / Detail</label>
                <textarea name="body" id="body" rows="6"
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm">{{ old('body', $program->body) }}</textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-stone-100">
                <a href="{{ route('admin.programs.index') }}" class="px-5 py-2.5 rounded-xl border border-stone-300 text-stone-700 text-xs font-semibold">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324]">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
