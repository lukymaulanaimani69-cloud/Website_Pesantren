<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->query('status');
        $query = ContactMessage::latest();

        if ($status) {
            $query->where('status', $status);
        }

        $messages = $query->paginate(15)->withQueryString();

        return view('admin.messages.index', compact('messages', 'status'));
    }

    public function show(ContactMessage $message): View
    {
        if ($message->status === 'unread') {
            $message->update(['status' => 'read']);
        }

        return view('admin.messages.show', compact('message'));
    }

    public function markReplied(Request $request, ContactMessage $message): RedirectResponse
    {
        $message->update([
            'status' => 'replied',
            'replied_at' => now(),
            'admin_notes' => $request->input('admin_notes'),
        ]);

        return back()->with('success', 'Status pesan diperbarui menjadi telah ditangani/dibalas.');
    }

    public function destroy(ContactMessage $message): RedirectResponse
    {
        AuditLog::record('delete_message', $message, ['subject' => $message->subject]);
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
