@extends('layouts.admin')

@section('header_title', 'Dashboard Utama')

@section('content')
<div class="space-y-8">
    <!-- Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Berita Terbit -->
        <div class="bg-white rounded-2xl p-5 border border-stone-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-stone-500 block uppercase tracking-wider">Berita Terbit</span>
                <span class="text-2xl font-extrabold text-[#14532D] mt-1 block">{{ $stats['posts_published'] }}</span>
                <span class="text-[11px] text-stone-400">Draf: {{ $stats['posts_draft'] }}</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-[#287D52] flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            </div>
        </div>

        <!-- Program Pendidikan -->
        <div class="bg-white rounded-2xl p-5 border border-stone-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-stone-500 block uppercase tracking-wider">Program Pendidikan</span>
                <span class="text-2xl font-extrabold text-[#14532D] mt-1 block">{{ $stats['programs'] }}</span>
                <span class="text-[11px] text-stone-400">Kurikulum Aktif</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-[#287D52] flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
        </div>

        <!-- PSB Masuk -->
        <div class="bg-white rounded-2xl p-5 border border-stone-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-stone-500 block uppercase tracking-wider">Pendaftar Santri (PSB)</span>
                <span class="text-2xl font-extrabold text-[#14532D] mt-1 block">{{ $stats['psb_total'] }}</span>
                <span class="text-[11px] text-amber-600 font-semibold">{{ $stats['psb_submitted'] }} Menunggu Review</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
        </div>

        <!-- Pesan Kontak Masuk -->
        <div class="bg-white rounded-2xl p-5 border border-stone-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-stone-500 block uppercase tracking-wider">Pesan Kontak Baru</span>
                <span class="text-2xl font-extrabold text-[#14532D] mt-1 block">{{ $stats['unread_messages'] }}</span>
                <span class="text-[11px] text-stone-400">Belum dibalas</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Aktivitas Pendaftar PSB Terbaru -->
        @if(auth()->user()->canReviewPsb())
            <div class="bg-white rounded-2xl p-6 border border-stone-200 shadow-xs">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-bold text-[#14532D] uppercase tracking-wider">Pendaftaran Santri Terbaru</h2>
                    <a href="{{ route('admin.psb.index') }}" class="text-xs font-semibold text-[#287D52] hover:underline">Lihat Semua</a>
                </div>
                <div class="divide-y divide-stone-100">
                    @forelse($recentRegistrations as $reg)
                        <div class="py-3 flex items-center justify-between text-xs">
                            <div>
                                <strong class="text-stone-800 block">{{ $reg->student_name }}</strong>
                                <span class="text-stone-400 font-mono">{{ $reg->registration_number ?? 'DRAF' }} &bull; Wali: {{ $reg->guardian_name }}</span>
                            </div>
                            <div class="text-right">
                                <span class="inline-block px-2 py-0.5 rounded-full text-[10px] font-semibold border {{ $reg->status->badgeClass() }}">
                                    {{ $reg->status->label() }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-xs text-stone-400 py-4 text-center">Belum ada pengajuan pendaftaran santri baru.</p>
                    @endforelse
                </div>
            </div>
        @endif

        <!-- Berita Terbaru -->
        @if(auth()->user()->canManageContent())
            <div class="bg-white rounded-2xl p-6 border border-stone-200 shadow-xs">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-bold text-[#14532D] uppercase tracking-wider">Warta & Pengumuman Terbaru</h2>
                    <a href="{{ route('admin.posts.index') }}" class="text-xs font-semibold text-[#287D52] hover:underline">Kelola Berita</a>
                </div>
                <div class="divide-y divide-stone-100">
                    @forelse($recentPosts as $p)
                        <div class="py-3 flex items-center justify-between text-xs">
                            <div class="max-w-[70%]">
                                <strong class="text-stone-800 block truncate">{{ $p->title }}</strong>
                                <span class="text-stone-400">{{ $p->category?->name ?? 'Warta' }} &bull; {{ $p->created_at->diffForHumans() }}</span>
                            </div>
                            <div>
                                <span class="inline-block px-2 py-0.5 rounded-full text-[10px] font-semibold {{ $p->status === 'published' ? 'bg-emerald-100 text-emerald-800' : 'bg-stone-100 text-stone-600' }}">
                                    {{ ucfirst($p->status) }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-xs text-stone-400 py-4 text-center">Belum ada artikel berita.</p>
                    @endforelse
                </div>
            </div>
        @endif
    </div>

    <!-- Log Aktivitas Admin Sensitif (Super Admin Only) -->
    @if(auth()->user()->isSuperAdmin() && $recentAuditLogs->isNotEmpty())
        <div class="bg-white rounded-2xl p-6 border border-stone-200 shadow-xs">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-sm font-bold text-stone-700 uppercase tracking-wider">Jejak Aktivitas & Audit Staf Terkini</h2>
                <a href="{{ route('admin.audit-logs.index') }}" class="text-xs font-semibold text-[#287D52] hover:underline">Buka Semua Log</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-xs text-left">
                    <thead class="text-stone-500 bg-stone-50 border-b border-stone-200">
                        <tr>
                            <th class="px-4 py-2">Waktu</th>
                            <th class="px-4 py-2">Staf / Aktor</th>
                            <th class="px-4 py-2">Aksi</th>
                            <th class="px-4 py-2">Target</th>
                            <th class="px-4 py-2">IP Address</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @foreach($recentAuditLogs as $log)
                            <tr>
                                <td class="px-4 py-2.5 text-stone-500">{{ $log->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-4 py-2.5 font-medium text-stone-800">{{ $log->actor?->name ?? 'Sistem / Anonim' }}</td>
                                <td class="px-4 py-2.5 font-mono text-emerald-800">{{ $log->action }}</td>
                                <td class="px-4 py-2.5 text-stone-600">{{ class_basename($log->subject_type ?? '-') }}</td>
                                <td class="px-4 py-2.5 text-stone-400 font-mono">{{ $log->ip_address }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
