<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Inclusion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();
        $programs = Program::whereHas('gym', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
        // $programs = Program::all();
        return view('owner.program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gyms = Auth::user()->gyms;
        return view('owner.program.create', compact('gyms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $program = new Program();

        $program->title = $request->input('title');
        $program->description = $request->input('description');
        //who created the gym
        $program->gym_id = $request->gym_id;
        $program->save();

        return redirect()->route('programs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        //
    }
}
