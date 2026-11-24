<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->query('status');
        $search = $request->query('cari');

        $query = Post::with(['category', 'author'])->latest();

        if ($status) {
            $query->where('status', $status);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('summary', 'LIKE', "%{$search}%");
            });
        }

        $posts = $query->paginate(10)->withQueryString();

        return view('admin.posts.index', compact('posts', 'status', 'search'));
    }

    public function create(): View
    {
        $categories = PostCategory::all();

        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:post_categories,id'],
            'summary' => ['nullable', 'string', 'max:500'],
            'body' => ['required', 'string'],
            'status' => ['required', 'in:draft,published,archived'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'], // 5MB
        ], [
            'title.required' => 'Judul berita wajib diisi.',
            'body.required' => 'Isi berita tidak boleh kosong.',
            'featured_image.image' => 'Berkas harus berupa gambar.',
            'featured_image.max' => 'Ukuran gambar maksimal 5 MB.',
        ]);

        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug;
        $counter = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $imagePath = $file->store('posts', 'public');
            $imagePath = 'storage/' . $imagePath;
        }

        $post = Post::create([
            'author_id' => auth()->id(),
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'summary' => $validated['summary'],
            'body' => $validated['body'],
            'status' => $validated['status'],
            'featured_image' => $imagePath,
            'published_at' => $validated['status'] === 'published' ? now() : null,
        ]);

        AuditLog::record('create_post', $post, [
            'title' => $post->title,
            'status' => $post->status,
        ]);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Berita berhasil disimpan.');
    }

    public function edit(Post $post): View
    {
        $categories = PostCategory::all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:post_categories,id'],
            'summary' => ['nullable', 'string', 'max:500'],
            'body' => ['required', 'string'],
            'status' => ['required', 'in:draft,published,archived'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
        ]);

        $data = [
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'summary' => $validated['summary'],
            'body' => $validated['body'],
            'status' => $validated['status'],
        ];

        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $imagePath = $file->store('posts', 'public');
            $data['featured_image'] = 'storage/' . $imagePath;
        }

        $wasDraft = $post->status === 'draft';
        if ($validated['status'] === 'published' && ($wasDraft || ! $post->published_at)) {
            $data['published_at'] = now();
        }

        $post->update($data);

        AuditLog::record('update_post', $post, [
            'title' => $post->title,
            'status' => $post->status,
        ]);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Perubahan berita berhasil disimpan.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        AuditLog::record('delete_post', $post, [
            'title' => $post->title,
        ]);

        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
