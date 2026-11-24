@extends('layouts.admin')

@section('header_title', 'Detail Verifikasi Pendaftar PSB')

@section('content')
<div class="space-y-6 max-w-5xl">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.psb.index') }}" class="text-xs text-stone-500 hover:text-stone-800 flex items-center gap-1 font-semibold">
            &larr; Kembali ke Daftar Pendaftar
        </a>
        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold border {{ $registration->status->badgeClass() }}">
            {{ $registration->status->label() }}
        </span>
    </div>

    <!-- Informasi Utama Calon Santri -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2 bg-white rounded-2xl p-6 border border-stone-200 shadow-xs space-y-4">
            <h2 class="text-sm font-bold text-[#14532D] uppercase tracking-wider border-b pb-2">Biodata Calon Santri</h2>
            <div class="grid grid-cols-2 gap-4 text-xs">
                <div>
                    <span class="text-stone-400 block">Nomor Pendaftaran</span>
                    <strong class="text-stone-800 font-mono text-sm">{{ $registration->registration_number ?? 'DRAF' }}</strong>
                </div>
                <div>
                    <span class="text-stone-400 block">Nama Lengkap</span>
                    <strong class="text-stone-800">{{ $registration->student_name }}</strong>
                </div>
                <div>
                    <span class="text-stone-400 block">Jenis Kelamin</span>
                    <span class="text-stone-800">{{ $registration->gender === 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                </div>
                <div>
                    <span class="text-stone-400 block">Tempat, Tanggal Lahir</span>
                    <span class="text-stone-800">{{ $registration->birth_place }}, {{ $registration->birth_date?->translatedFormat('d F Y') ?? '-' }}</span>
                </div>
                <div>
                    <span class="text-stone-400 block">Program Pilihan</span>
                    <strong class="text-[#287D52]">{{ $registration->chosen_program ?? '-' }}</strong>
                </div>
                <div>
                    <span class="text-stone-400 block">Asal Sekolah</span>
                    <span class="text-stone-800">{{ $registration->previous_school ?? '-' }}</span>
                </div>
                <div class="col-span-2">
                    <span class="text-stone-400 block">Alamat Tinggal</span>
                    <span class="text-stone-800">{{ $registration->address ?? '-' }}</span>
                </div>
            </div>

            <h2 class="text-sm font-bold text-[#14532D] uppercase tracking-wider border-b pt-4 pb-2">Informasi Orang Tua / Wali</h2>
            <div class="grid grid-cols-2 gap-4 text-xs">
                <div>
                    <span class="text-stone-400 block">Nama Wali</span>
                    <strong class="text-stone-800">{{ $registration->guardian_name }}</strong>
                </div>
                <div>
                    <span class="text-stone-400 block">Hubungan</span>
                    <span class="text-stone-800">{{ $registration->guardian_relation ?? 'Orang Tua' }}</span>
                </div>
                <div>
                    <span class="text-stone-400 block">Nomor HP / WhatsApp</span>
                    <span class="text-stone-800 font-mono">{{ $registration->guardian_contact }}</span>
                </div>
                <div>
                    <span class="text-stone-400 block">Akun User Login</span>
                    <span class="text-stone-800 font-mono">{{ $registration->user?->email }}</span>
                </div>
            </div>
        </div>

        <!-- Form Keputusan Verifikator -->
        <div class="bg-white rounded-2xl p-6 border border-stone-200 shadow-xs space-y-4 flex flex-col justify-between">
            <div>
                <h2 class="text-sm font-bold text-[#14532D] uppercase tracking-wider border-b pb-2">Keputusan Petugas</h2>
                <form action="{{ route('admin.psb.update-status', $registration) }}" method="POST" class="space-y-4 mt-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-stone-700 mb-1">Ubah Status</label>
                        <select name="status" required class="w-full px-3 py-2 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-[#287D52]">
                            <option value="needs_revision" {{ $registration->status->value === 'needs_revision' ? 'selected' : '' }}>Perlu Revisi Berkas</option>
                            <option value="verified" {{ $registration->status->value === 'verified' ? 'selected' : '' }}>Berkas Terverifikasi (Valid)</option>
                            <option value="accepted" {{ $registration->status->value === 'accepted' ? 'selected' : '' }}>Lulus / Diterima</option>
                            <option value="rejected" {{ $registration->status->value === 'rejected' ? 'selected' : '' }}>Tidak Diterima</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-stone-700 mb-1">Catatan / Alasan</label>
                        <textarea name="note" rows="4" required class="w-full px-3 py-2 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-[#287D52]" placeholder="Tuliskan catatan verifikasi untuk pendaftar..."></textarea>
                    </div>

                    <button type="submit" class="w-full py-2.5 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324] transition">
                        Simpan Keputusan Seleksi
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Berkas Dokumen -->
    <div class="bg-white rounded-2xl p-6 border border-stone-200 shadow-xs">
        <h2 class="text-sm font-bold text-[#14532D] uppercase tracking-wider mb-4">Berkas Lampiran Pendaftar</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
            @forelse($registration->documents as $doc)
                <div class="p-4 rounded-xl border border-stone-200 bg-stone-50 flex flex-col justify-between">
                    <div>
                        <span class="font-semibold text-stone-800 block capitalize">{{ str_replace('_', ' ', $doc->document_type) }}</span>
                        <span class="text-[10px] text-stone-400 block mt-1">{{ $doc->original_name ?? 'Dokumen' }}</span>
                    </div>
                    <div class="mt-4 pt-2 border-t border-stone-200">
                        <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="text-xs font-semibold text-[#287D52] hover:underline">
                            Lihat Berkas &rarr;
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-6 text-stone-400">Belum ada berkas yang diunggah.</div>
            @endforelse
        </div>
    </div>

    <!-- Riwayat Status Seleksi -->
    <div class="bg-white rounded-2xl p-6 border border-stone-200 shadow-xs">
        <h2 class="text-sm font-bold text-[#14532D] uppercase tracking-wider mb-4">Riwayat Perubahan Status</h2>
        <div class="divide-y divide-stone-100 text-xs">
            @forelse($registration->histories as $hist)
                <div class="py-3 flex items-start justify-between">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="font-semibold text-stone-800">{{ $hist->actor?->name ?? 'Sistem' }}</span>
                            <span class="text-stone-400">&bull;</span>
                            <span class="text-emerald-700 font-mono">{{ $hist->from_status }} &rarr; {{ $hist->to_status }}</span>
                        </div>
                        <p class="text-stone-600 mt-1">{{ $hist->note ?? 'Tanpa catatan' }}</p>
                    </div>
                    <span class="text-stone-400 text-[10px]">{{ $hist->created_at->translatedFormat('d M Y H:i') }}</span>
                </div>
            @empty
                <p class="text-stone-400 text-center py-4">Belum ada catatan riwayat status.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
