<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $events = Event::latest('start_at')->paginate(10);

        return view('admin.events.index', compact('events'));
    }

    public function create(): View
    {
        return view('admin.events.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'start_at' => ['required', 'date'],
            'location_text' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug;
        $counter = 1;
        while (Event::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        $event = Event::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'start_at' => $validated['start_at'],
            'location_text' => $validated['location_text'],
            'description' => $validated['description'],
            'status' => $validated['status'],
        ]);

        AuditLog::record('create_event', $event, ['title' => $event->title]);

        return redirect()->route('admin.events.index')->with('success', 'Agenda kegiatan berhasil dibuat.');
    }

    public function edit(Event $event): View
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'start_at' => ['required', 'date'],
            'location_text' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $event->update($validated);

        AuditLog::record('update_event', $event, ['title' => $event->title]);

        return redirect()->route('admin.events.index')->with('success', 'Agenda kegiatan berhasil diperbarui.');
    }

    public function destroy(Event $event): RedirectResponse
    {
        AuditLog::record('delete_event', $event, ['title' => $event->title]);
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Agenda kegiatan berhasil dihapus.');
    }
}
