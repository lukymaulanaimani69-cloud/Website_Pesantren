<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Program;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProgramController extends Controller
{
    public function index(): View
    {
        $programs = Program::orderBy('sort_order', 'asc')->get();

        return view('admin.programs.index', compact('programs'));
    }

    public function create(): View
    {
        return view('admin.programs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'summary' => ['nullable', 'string', 'max:500'],
            'body' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $baseSlug = Str::slug($validated['name']);
        $slug = $baseSlug;
        $counter = 1;
        while (Program::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        $program = Program::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'summary' => $validated['summary'],
            'body' => $validated['body'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'status' => $validated['status'],
        ]);

        AuditLog::record('create_program', $program, ['name' => $program->name]);

        return redirect()->route('admin.programs.index')->with('success', 'Program pendidikan berhasil ditambahkan.');
    }

    public function edit(Program $program): View
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'summary' => ['nullable', 'string', 'max:500'],
            'body' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $program->update($validated);

        AuditLog::record('update_program', $program, ['name' => $program->name]);

        return redirect()->route('admin.programs.index')->with('success', 'Program pendidikan berhasil diperbarui.');
    }

    public function destroy(Program $program): RedirectResponse
    {
        AuditLog::record('delete_program', $program, ['name' => $program->name]);
        $program->delete();

        return redirect()->route('admin.programs.index')->with('success', 'Program pendidikan berhasil dihapus.');
    }
}
