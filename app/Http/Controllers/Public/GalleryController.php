<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::published()->with('media')->paginate(6);

        return view('public.galeri.index', compact('galleries'));
    }

    public function show(string $slug): View
    {
        $gallery = Gallery::published()->with('media')->where('slug', $slug)->firstOrFail();

        return view('public.galeri.show', compact('gallery'));
    }
}
