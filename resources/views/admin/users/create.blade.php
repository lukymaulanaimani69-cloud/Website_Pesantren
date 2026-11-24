@extends('layouts.admin')

@section('header_title', 'Tambah Pengguna Baru')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-stone-200 shadow-xs">
        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52]">
            </div>

            <div>
                <label for="email" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Alamat Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52]">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="phone" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">No. WhatsApp / HP</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52]">
                </div>
                <div>
                    <label for="role" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Peran Akses (Role)</label>
                    <select name="role" id="role" required class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm">
                        @foreach($roles as $role)
                            <option value="{{ $role->value }}">{{ $role->label() }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-stone-700 uppercase tracking-wider mb-1">Kata Sandi (Min 8 Karakter)</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-stone-800 text-sm focus:ring-2 focus:ring-[#287D52]">
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-stone-100">
                <a href="{{ route('admin.users.index') }}" class="px-5 py-2.5 rounded-xl border border-stone-300 text-stone-700 text-xs font-semibold">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324]">Simpan Pengguna</button>
            </div>
        </form>
    </div>
</div>
@endsection
