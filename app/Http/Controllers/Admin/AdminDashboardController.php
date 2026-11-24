<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RegistrationStatus;
use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\ContactMessage;
use App\Models\Event;
use App\Models\Post;
use App\Models\Program;
use App\Models\Registration;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'posts_published' => Post::where('status', 'published')->count(),
            'posts_draft' => Post::where('status', 'draft')->count(),
            'programs' => Program::count(),
            'events' => Event::count(),
            'unread_messages' => ContactMessage::where('status', 'unread')->count(),
            'total_users' => User::count(),
            'psb_total' => Registration::count(),
            'psb_submitted' => Registration::where('status', RegistrationStatus::SUBMITTED)->count(),
            'psb_verified' => Registration::where('status', RegistrationStatus::VERIFIED)->count(),
            'psb_accepted' => Registration::where('status', RegistrationStatus::ACCEPTED)->count(),
            'psb_needs_revision' => Registration::where('status', RegistrationStatus::NEEDS_REVISION)->count(),
        ];

        $recentRegistrations = auth()->user()->canReviewPsb()
            ? Registration::with('period')->latest()->take(5)->get()
            : collect();

        $recentPosts = auth()->user()->canManageContent()
            ? Post::with('category')->latest()->take(5)->get()
            : collect();

        $recentAuditLogs = auth()->user()->isSuperAdmin()
            ? AuditLog::with('actor')->latest()->take(6)->get()
            : collect();

        return view('admin.dashboard', compact('stats', 'recentRegistrations', 'recentPosts', 'recentAuditLogs'));
    }
}
