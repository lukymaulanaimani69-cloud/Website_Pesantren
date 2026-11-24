@extends('layouts.admin')

@section('header_title', 'Manajemen Pengguna & Staf')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <a href="{{ route('admin.users.create') }}" class="px-4 py-2 rounded-xl bg-[#14532D] text-white text-xs font-semibold hover:bg-[#114324] transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Staf / Pengguna Baru</span>
        </a>

        <div class="flex items-center gap-2 text-xs">
            <a href="{{ route('admin.users.index') }}" class="px-3 py-1.5 rounded-xl {{ !$role ? 'bg-[#14532D] text-white font-semibold' : 'bg-white border text-stone-600' }}">Semua Peran</a>
            <a href="{{ route('admin.users.index', ['role' => 'super_admin']) }}" class="px-3 py-1.5 rounded-xl {{ $role === 'super_admin' ? 'bg-[#14532D] text-white font-semibold' : 'bg-white border text-stone-600' }}">Super Admin</a>
            <a href="{{ route('admin.users.index', ['role' => 'editor']) }}" class="px-3 py-1.5 rounded-xl {{ $role === 'editor' ? 'bg-[#14532D] text-white font-semibold' : 'bg-white border text-stone-600' }}">Editor</a>
            <a href="{{ route('admin.users.index', ['role' => 'psb_officer']) }}" class="px-3 py-1.5 rounded-xl {{ $role === 'psb_officer' ? 'bg-[#14532D] text-white font-semibold' : 'bg-white border text-stone-600' }}">Petugas PSB</a>
            <a href="{{ route('admin.users.index', ['role' => 'applicant']) }}" class="px-3 py-1.5 rounded-xl {{ $role === 'applicant' ? 'bg-[#14532D] text-white font-semibold' : 'bg-white border text-stone-600' }}">Pendaftar</a>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="text-stone-500 bg-stone-50 border-b border-stone-200 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Nama Lengkap</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">No. WhatsApp</th>
                        <th class="px-6 py-3">Peran (Role)</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @foreach($users as $user)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4 font-semibold text-stone-800">
                                {{ $user->name }}
                                @if($user->id === auth()->id())
                                    <span class="text-[10px] text-emerald-600 font-normal ml-1">(Anda)</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-stone-600 font-mono">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-stone-500 font-mono">{{ $user->phone ?? '-' }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-100 text-emerald-800">
                                    {{ $user->role->label() }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-semibold {{ $user->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-100 text-rose-800' }}">
                                    {{ $user->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.users.edit', $user) }}" class="text-[#287D52] hover:underline font-semibold">Ubah</a>
                                @if($user->id !== auth()->id())
                                    <span>&bull;</span>
                                    <form action="{{ route('admin.users.toggle-status', $user) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-stone-500 hover:text-stone-800 underline">
                                            {{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-stone-100">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
