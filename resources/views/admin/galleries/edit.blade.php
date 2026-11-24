@extends('layouts.admin')

@section('header_title', 'Kelola Album: ' . $gallery->title)

@section('content')
<div class="space-y-8 max-w-4xl mx-auto">
    <!-- Form Unggah Foto ke Album -->
    <div class="bg-white rounded-2xl p-6 border border-stone-200 shadow-xs">
        <h2 class="text-sm font-bold text-[#14532D] uppercase tracking-wider mb-4">Unggah Foto Baru ke Album</h2>
        <form action="{{ route('admin.galleries.upload-photo', $gallery) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="photo" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Pilih File Foto (Maks 5 MB)</label>
                    <input type="file" name="photo" id="photo" accept="image/*" required
                        class="w-full text-xs text-stone-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-[#14532D]">
                </div>
                <div>
                    <label for="caption" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Keterangan / Kepsyen Foto</label>
                    <input type="text" name="caption" id="caption" placeholder="Contoh: Pengajian Kitab Fiqih"
                        class="w-full px-3 py-2 rounded-xl border border-stone-300 text-stone-800 text-xs focus:ring-2 focus:ring-[#287D52]">
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324] transition">
                    Unggah Foto
                </button>
            </div>
        </form>
    </div>

    <!-- Koleksi Foto Saat Ini -->
    <div class="bg-white rounded-2xl p-6 border border-stone-200 shadow-xs">
        <h2 class="text-sm font-bold text-stone-700 uppercase tracking-wider mb-4">Koleksi Foto Dalam Album ({{ $gallery->media->count() }})</h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($gallery->media as $item)
                <div class="border border-stone-200 rounded-xl overflow-hidden flex flex-col justify-between">
                    <div class="h-32 bg-stone-100 flex items-center justify-center overflow-hidden">
                        @if($item->url)
                            <img src="{{ $item->url }}" alt="{{ $item->caption }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-[11px] text-stone-400">Foto</span>
                        @endif
                    </div>
                    <div class="p-2.5 bg-stone-50 flex items-center justify-between text-xs">
                        <span class="text-[11px] text-stone-600 truncate max-w-[120px]">{{ $item->caption ?? 'Tanpa kepsyen' }}</span>
                        <form action="{{ route('admin.galleries.delete-photo', $item) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-600 hover:text-rose-800 text-xs font-bold">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-8 text-stone-400 text-xs">
                    Belum ada foto yang diunggah ke dalam album ini.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
