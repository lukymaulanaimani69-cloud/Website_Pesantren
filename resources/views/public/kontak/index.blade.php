@extends('layouts.public')

@section('title', 'Hubungi Kami')

@section('content')
<div class="py-12 bg-white border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#14532D] tracking-tight">Kontak & Lokasi</h1>
        <p class="text-xs sm:text-sm text-stone-500 mt-2">Hubungi bagian sekretariat dan informasi Pondok Pesantren Damanhuri Romly</p>
    </div>
</div>

<div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Informasi Kontak Resmi -->
        <div class="space-y-6">
            <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-sm space-y-4">
                <h2 class="text-xl font-bold text-[#14532D]">Sekretariat Lembaga</h2>
                <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                    Kami melayani konsultasi pendaftaran, permohonan kunjungan wali santri, serta korespondensi kelembagaan melalui saluran resmi berikut:
                </p>

                <div class="space-y-3 pt-2 text-xs sm:text-sm">
                    <div class="flex items-start gap-3">
                        <span class="w-8 h-8 rounded-lg bg-emerald-50 text-[#14532D] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </span>
                        <div>
                            <strong class="text-stone-800 block">Alamat Kampus:</strong>
                            <span class="text-stone-600">{{ \App\Models\SiteSetting::get('contact_address', '[Alamat Resmi Belum Terkonfirmasi]') }}</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="w-8 h-8 rounded-lg bg-emerald-50 text-[#14532D] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </span>
                        <div>
                            <strong class="text-stone-800 block">Telepon Kantor:</strong>
                            <span class="text-stone-600">{{ \App\Models\SiteSetting::get('contact_phone', '(0335) xxxxxxx') }}</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="w-8 h-8 rounded-lg bg-emerald-50 text-[#14532D] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        </span>
                        <div>
                            <strong class="text-stone-800 block">Layanan WhatsApp:</strong>
                            <span class="text-stone-600">{{ \App\Models\SiteSetting::get('contact_whatsapp', '08xxxxxxxxxx') }}</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="w-8 h-8 rounded-lg bg-emerald-50 text-[#14532D] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </span>
                        <div>
                            <strong class="text-stone-800 block">Email Resmi:</strong>
                            <span class="text-stone-600">{{ \App\Models\SiteSetting::get('contact_email', 'kontak@damanhuriromly.sch.id') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulir Pesan Masuk -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-sm">
            <h2 class="text-xl font-bold text-[#14532D] mb-2">Kirim Pesan ke Pengelola</h2>
            <p class="text-xs text-stone-500 mb-6">Sampaikan pertanyaan atau informasi kepada sekretariat pesantren.</p>

            <form action="{{ route('kontak.submit') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-xs sm:text-sm focus:ring-2 focus:ring-[#287D52] focus:border-transparent transition"
                        placeholder="Nama Anda">
                    @error('name')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="contact" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Kontak Anda (No. WhatsApp / Email)</label>
                    <input type="text" name="contact" id="contact" value="{{ old('contact') }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-xs sm:text-sm focus:ring-2 focus:ring-[#287D52] focus:border-transparent transition"
                        placeholder="081234567890 atau email@domain.com">
                    @error('contact')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="subject" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Subjek / Perihal</label>
                    <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-xs sm:text-sm focus:ring-2 focus:ring-[#287D52] focus:border-transparent transition"
                        placeholder="Contoh: Pertanyaan Syarat PSB">
                    @error('subject')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="message" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Isi Pesan</label>
                    <textarea name="message" id="message" rows="4" required
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-xs sm:text-sm focus:ring-2 focus:ring-[#287D52] focus:border-transparent transition"
                        placeholder="Tuliskan pesan Anda secara lengkap...">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full py-3 px-4 rounded-xl text-white font-semibold text-xs sm:text-sm bg-gradient-to-r from-[#14532D] to-[#287D52] hover:from-[#114324] hover:to-[#216743] shadow-md transition">
                    Kirim Pesan Sekarang
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
