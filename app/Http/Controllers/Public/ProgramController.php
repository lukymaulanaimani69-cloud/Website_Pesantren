<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\View\View;

class ProgramController extends Controller
{
    public function index(): View
    {
        $programs = Program::published()->get();

        return view('public.program.index', compact('programs'));
    }

    public function show(string $slug): View
    {
        $program = Program::published()->where('slug', $slug)->firstOrFail();
        $otherPrograms = Program::published()->where('id', '!=', $program->id)->take(3)->get();

        return view('public.program.show', compact('program', 'otherPrograms'));
    }
}
