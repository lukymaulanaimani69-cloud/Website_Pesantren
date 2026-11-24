<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $categorySlug = $request->query('kategori');
        $search = $request->query('cari');

        $query = Post::published()->with(['category', 'author'])->latest('published_at');

        if ($categorySlug) {
            $category = PostCategory::where('slug', $categorySlug)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('summary', 'LIKE', "%{$search}%")
                  ->orWhere('body', 'LIKE', "%{$search}%");
            });
        }

        $posts = $query->paginate(6)->withQueryString();
        $categories = PostCategory::withCount(['posts' => fn ($q) => $q->published()])->get();

        return view('public.berita.index', compact('posts', 'categories', 'categorySlug', 'search'));
    }

    public function show(string $slug): View
    {
        // Strictly published only for public visitors
        $post = Post::published()->with(['category', 'author'])->where('slug', $slug)->firstOrFail();
        $recentPosts = Post::published()->where('id', '!=', $post->id)->latest('published_at')->take(4)->get();

        return view('public.berita.show', compact('post', 'recentPosts'));
    }
}
