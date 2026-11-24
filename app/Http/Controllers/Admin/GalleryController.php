<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Gallery;
use App\Models\GalleryMedia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::withCount('media')->get();

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create(): View
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug;
        $counter = 1;
        while (Gallery::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        $gallery = Gallery::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'description' => $validated['description'],
            'status' => $validated['status'],
        ]);

        AuditLog::record('create_gallery', $gallery, ['title' => $gallery->title]);

        return redirect()->route('admin.galleries.index')->with('success', 'Album galeri berhasil dibuat.');
    }

    public function edit(Gallery $gallery): View
    {
        $gallery->load('media');

        return view('admin.galleries.edit', compact('gallery'));
    }

    public function uploadPhoto(Request $request, Gallery $gallery): RedirectResponse
    {
        $request->validate([
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'caption' => ['nullable', 'string', 'max:255'],
        ]);

        $path = $request->file('photo')->store('galleries', 'public');

        $gallery->media()->create([
            'image_path' => 'storage/' . $path,
            'caption' => $request->input('caption'),
            'sort_order' => $gallery->media()->count() + 1,
        ]);

        return back()->with('success', 'Foto berhasil ditambahkan ke album.');
    }

    public function deletePhoto(GalleryMedia $media): RedirectResponse
    {
        $media->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        AuditLog::record('delete_gallery', $gallery, ['title' => $gallery->title]);
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Album galeri berhasil dihapus.');
    }
}
