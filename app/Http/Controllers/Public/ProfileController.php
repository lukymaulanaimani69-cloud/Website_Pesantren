<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\SiteSetting;
use App\Models\StaffProfile;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function sejarah(): View
    {
        $page = Page::published()->where('slug', 'sejarah')->first();
        $historyText = SiteSetting::get('profile_history');

        return view('public.profil.sejarah', compact('page', 'historyText'));
    }

    public function visiMisi(): View
    {
        $page = Page::published()->where('slug', 'visi-misi')->first();
        $vision = SiteSetting::get('profile_vision');
        $mission = SiteSetting::get('profile_mission');

        return view('public.profil.visi-misi', compact('page', 'vision', 'mission'));
    }

    public function pengasuh(): View
    {
        $staff = StaffProfile::published()->get();

        return view('public.profil.pengasuh', compact('staff'));
    }
}
