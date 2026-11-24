@extends('layouts.admin')

@section('header_title', 'Pengaturan Identitas & Kontak Situs')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-xs space-y-6">
        <div class="border-b pb-4">
            <h2 class="text-sm font-bold text-[#14532D] uppercase tracking-wider">Identitas Pondok Pesantren</h2>
            <p class="text-xs text-stone-500 mt-1">Konfigurasi informasi resmi pesantren yang tampil pada website publik, kop surat, dan footer.</p>
        </div>

        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-stone-700 mb-1">Nama Resmi Pesantren</label>
                    <input type="text" name="site_name" value="{{ \App\Models\SiteSetting::get('site_name', 'Pondok Pesantren Damanhuri Romly') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-[#287D52]">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-stone-700 mb-1">Motto / Tagline Pesantren</label>
                    <input type="text" name="site_tagline" value="{{ \App\Models\SiteSetting::get('site_tagline', 'Mencetak Generasi Berakhlak Mulia, Berilmu Luas, dan Berwawasan Global.') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-[#287D52]">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-stone-700 mb-1">Email Sekretariat</label>
                    <input type="email" name="contact_email" value="{{ \App\Models\SiteSetting::get('contact_email', 'kontak@damanhuriromly.sch.id') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-[#287D52]">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-stone-700 mb-1">Nomor Telepon / WhatsApp</label>
                    <input type="text" name="contact_phone" value="{{ \App\Models\SiteSetting::get('contact_phone', '(0335) xxxxxxx') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-[#287D52]">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-stone-700 mb-1">Alamat Lengkap</label>
                    <input type="text" name="address" value="{{ \App\Models\SiteSetting::get('address', 'Genggong, Probolinggo, Jawa Timur') }}" class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-[#287D52]">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-stone-700 mb-1">Deskripsi Singkat Lembaga</label>
                    <textarea name="site_description" rows="3" class="w-full px-3.5 py-2.5 rounded-xl border border-stone-300 text-xs focus:ring-2 focus:ring-[#287D52]">{{ \App\Models\SiteSetting::get('site_description', 'Website Resmi Pondok Pesantren Damanhuri Romly.') }}</textarea>
                </div>
            </div>

            <div class="pt-4 border-t flex justify-end">
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324] transition">
                    Simpan Pengaturan Situs
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
