<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Facility;
use App\Models\Post;
use App\Models\Program;
use App\Models\RegistrationPeriod;
use App\Models\SiteSetting;
use App\Models\StaffProfile;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $posts = Post::published()->with('category')->latest('published_at')->take(3)->get();
        $programs = Program::published()->take(3)->get();
        $facilities = Facility::published()->take(4)->get();
        $events = Event::upcoming()->take(2)->get();
        $staffProfiles = StaffProfile::published()->take(3)->get();
        $activePeriod = RegistrationPeriod::currentActive();

        return view('public.home', compact(
            'posts',
            'programs',
            'facilities',
            'events',
            'staffProfiles',
            'activePeriod'
        ));
    }
}
