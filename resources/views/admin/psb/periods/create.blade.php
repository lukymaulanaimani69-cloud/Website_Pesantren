@extends('layouts.admin')

@section('header_title', 'Buka Gelombang PSB Baru')

@section('content')
<div class="max-w-2xl bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-xs space-y-6">
    <div class="flex items-center justify-between border-b pb-4">
        <h2 class="text-sm font-bold text-[#14532D] uppercase tracking-wider">Formulir Periode PSB</h2>
        <a href="{{ route('admin.psb.periods.index') }}" class="text-xs text-stone-500 hover:text-stone-800">&larr; Batal</a>
    </div>

    <form action="{{ route('admin.psb.periods.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-xs font-semibold text-stone-700 mb-1">Nama Gelombang PSB</label>
            <input type="text" name="name" required value="{{ old('name') }}" placeholder="Contoh: Gelombang I Jalur Reguler 2026/2027" class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-[#287D52]">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-semibold text-stone-700 mb-1">Tahun Ajaran</label>
                <input type="text" name="academic_year" value="{{ old('academic_year', '2026/2027') }}" placeholder="2026/2027" class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-[#287D52]">
            </div>
            <div>
                <label class="block text-xs font-semibold text-stone-700 mb-1">Status Keaktifan</label>
                <select name="is_active" class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-[#287D52]">
                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Aktif (Menerima Pendaftaran)</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Non-Aktif / Draft</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-semibold text-stone-700 mb-1">Tanggal Mulai Buka</label>
                <input type="date" name="opens_at" required value="{{ old('opens_at', date('Y-m-d')) }}" class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-[#287D52]">
            </div>
            <div>
                <label class="block text-xs font-semibold text-stone-700 mb-1">Batas Akhir Penutupan</label>
                <input type="date" name="closes_at" required value="{{ old('closes_at', date('Y-m-d', strtotime('+30 days'))) }}" class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-[#287D52]">
            </div>
        </div>

        <div>
            <label class="block text-xs font-semibold text-stone-700 mb-1">Keterangan / Informasi Pengumuman</label>
            <textarea name="description" rows="3" class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-[#287D52]" placeholder="Catatan tambahan mengenai gelombang ini...">{{ old('description') }}</textarea>
        </div>

        <div class="pt-4 border-t flex justify-end gap-3">
            <a href="{{ route('admin.psb.periods.index') }}" class="px-4 py-2.5 rounded-xl border border-stone-300 text-stone-600 text-xs font-medium">Batal</a>
            <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324] transition">
                Simpan Gelombang
            </button>
        </div>
    </form>
</div>
@endsection
