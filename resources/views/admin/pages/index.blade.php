@extends('layouts.admin')

@section('header_title', 'Kelola Halaman Profil')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="text-stone-500 bg-stone-50 border-b border-stone-200 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Judul Halaman</th>
                        <th class="px-6 py-3">Slug URL</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @foreach($pages as $page)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4 font-semibold text-stone-800">{{ $page->title }}</td>
                            <td class="px-6 py-4 font-mono text-stone-500">/{{ $page->slug }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-semibold {{ $page->status === 'published' ? 'bg-emerald-100 text-emerald-800' : 'bg-stone-100 text-stone-600' }}">
                                    {{ ucfirst($page->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.pages.edit', $page) }}" class="text-[#287D52] hover:underline font-semibold">Ubah Konten</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
