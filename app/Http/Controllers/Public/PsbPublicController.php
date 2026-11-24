<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\RegistrationPeriod;
use App\Models\SiteSetting;
use Illuminate\View\View;

class PsbPublicController extends Controller
{
    public function info(): View
    {
        $activePeriod = RegistrationPeriod::currentActive();
        $allPeriods = RegistrationPeriod::latest('opens_at')->get();
        $psbFaqs = Faq::published()->where('category', 'PSB')->get();
        $psbAnnouncement = SiteSetting::get('psb_announcement');

        return view('public.psb.info', compact('activePeriod', 'allPeriods', 'psbFaqs', 'psbAnnouncement'));
    }
}
