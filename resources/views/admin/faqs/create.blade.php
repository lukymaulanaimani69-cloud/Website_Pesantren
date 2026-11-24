@extends('layouts.admin')

@section('header_title', 'Tambah FAQ Baru')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-xs">
        <form action="{{ route('admin.faqs.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="question" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Pertanyaan</label>
                <input type="text" name="question" id="question" value="{{ old('question') }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52]">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="category" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Kategori FAQ</label>
                    <input type="text" name="category" id="category" value="{{ old('category', 'PSB') }}"
                        placeholder="Contoh: PSB / Kehidupan Santri"
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52]">
                </div>
                <div>
                    <label for="is_published" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Status Publikasi</label>
                    <select name="is_published" id="is_published" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm">
                        <option value="1">Tampilkan</option>
                        <option value="0">Sembunyikan</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="answer" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Jawaban Lengkap</label>
                <textarea name="answer" id="answer" rows="5" required
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm">{{ old('answer') }}</textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-stone-100">
                <a href="{{ route('admin.faqs.index') }}" class="px-5 py-2.5 rounded-xl border border-stone-300 text-stone-700 text-xs font-semibold">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324]">Simpan FAQ</button>
            </div>
        </form>
    </div>
</div>
@endsection
