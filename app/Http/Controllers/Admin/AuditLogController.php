<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuditLogController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->query('cari');
        $query = AuditLog::with('actor')->latest();

        if ($search) {
            $query->where('action', 'LIKE', "%{$search}%")
                  ->orWhere('ip_address', 'LIKE', "%{$search}%");
        }

        $logs = $query->paginate(20)->withQueryString();

        return view('admin.audit-logs.index', compact('logs', 'search'));
    }
}
