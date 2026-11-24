@extends('layouts.admin')

@section('header_title', 'Tambah Agenda Kegiatan')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-xs">
        <form action="{{ route('admin.events.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="title" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Judul Kegiatan</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52]">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="start_at" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Waktu Mulai</label>
                    <input type="datetime-local" name="start_at" id="start_at" value="{{ old('start_at') }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52]">
                </div>
                <div>
                    <label for="status" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Status</label>
                    <select name="status" id="status" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm">
                        <option value="published">Terbit (Tampil)</option>
                        <option value="draft">Draf (Sembunyikan)</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="location_text" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Lokasi Kegiatan</label>
                <input type="text" name="location_text" id="location_text" value="{{ old('location_text') }}"
                    placeholder="Contoh: Masjid Jami' Pesantren / Aula Utama"
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52]">
            </div>

            <div>
                <label for="description" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Deskripsi & Keterangan</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm">{{ old('description') }}</textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-stone-100">
                <a href="{{ route('admin.events.index') }}" class="px-5 py-2.5 rounded-xl border border-stone-300 text-stone-700 text-xs font-semibold">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324]">Simpan Agenda</button>
            </div>
        </form>
    </div>
</div>
@endsection
