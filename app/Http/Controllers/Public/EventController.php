<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $upcomingEvents = Event::upcoming()->paginate(6);
        $pastEvents = Event::published()->where('start_at', '<', now()->startOfDay())->orderByDesc('start_at')->take(4)->get();

        return view('public.agenda.index', compact('upcomingEvents', 'pastEvents'));
    }

    public function show(string $slug): View
    {
        $event = Event::published()->where('slug', $slug)->firstOrFail();

        return view('public.agenda.show', compact('event'));
    }
}
