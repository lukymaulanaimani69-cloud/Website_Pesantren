<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        $faqs = Faq::orderBy('sort_order', 'asc')->get();

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create(): View
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'question' => ['required', 'string'],
            'answer' => ['required', 'string'],
            'category' => ['nullable', 'string', 'max:100'],
            'is_published' => ['required', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $faq = Faq::create($validated);

        AuditLog::record('create_faq', $faq, ['question' => Str::limit($faq->question, 50)]);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(Faq $faq): View
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $validated = $request->validate([
            'question' => ['required', 'string'],
            'answer' => ['required', 'string'],
            'category' => ['nullable', 'string', 'max:100'],
            'is_published' => ['required', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $faq->update($validated);

        AuditLog::record('update_faq', $faq, ['question' => Str::limit($faq->question, 50)]);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        AuditLog::record('delete_faq', $faq, ['question' => Str::limit($faq->question, 50)]);
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil dihapus.');
    }
}
