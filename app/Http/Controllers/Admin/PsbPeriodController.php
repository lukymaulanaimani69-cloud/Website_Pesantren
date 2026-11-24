<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\RegistrationPeriod;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PsbPeriodController extends Controller
{
    public function index(): View
    {
        $periods = RegistrationPeriod::withCount('registrations')->latest('opens_at')->get();

        return view('admin.psb.periods.index', compact('periods'));
    }

    public function create(): View
    {
        return view('admin.psb.periods.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'academic_year' => ['nullable', 'string', 'max:30'],
            'opens_at' => ['required', 'date'],
            'closes_at' => ['required', 'date', 'after:opens_at'],
            'is_active' => ['required', 'boolean'],
            'description' => ['nullable', 'string'],
            'requirements_text' => ['nullable', 'string'],
        ]);

        if ($validated['is_active']) {
            RegistrationPeriod::where('is_active', true)->update(['is_active' => false]);
        }

        $period = RegistrationPeriod::create($validated);

        AuditLog::record('create_psb_period', $period, ['name' => $period->name]);

        return redirect()->route('admin.psb.periods.index')->with('success', 'Gelombang PSB berhasil ditambahkan.');
    }

    public function edit(RegistrationPeriod $period): View
    {
        return view('admin.psb.periods.edit', compact('period'));
    }

    public function update(Request $request, RegistrationPeriod $period): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'academic_year' => ['nullable', 'string', 'max:30'],
            'opens_at' => ['required', 'date'],
            'closes_at' => ['required', 'date', 'after:opens_at'],
            'is_active' => ['required', 'boolean'],
            'description' => ['nullable', 'string'],
            'requirements_text' => ['nullable', 'string'],
        ]);

        if ($validated['is_active']) {
            RegistrationPeriod::where('id', '!=', $period->id)->update(['is_active' => false]);
        }

        $period->update($validated);

        AuditLog::record('update_psb_period', $period, ['name' => $period->name]);

        return redirect()->route('admin.psb.periods.index')->with('success', 'Gelombang PSB berhasil diperbarui.');
    }
}
