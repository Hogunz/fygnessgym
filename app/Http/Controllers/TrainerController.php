<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();


        $trainers = Trainer::whereHas('gym', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
        return view('owner.trainer.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gyms = Auth::user()->gyms;
        return view('owner.trainer.create', compact('gyms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        $trainer = new Trainer();

        $trainer->name = $request->input('name');
        $trainer->position = $request->input('position');
        //who created the gym
        $trainer->gym_id = $request->gym_id;
        $trainer->save();

        return redirect()->route('trainers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Trainer $trainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trainer $trainer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trainer $trainer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trainer $trainer)
    {
        //
    }
    public function showStaff()
    {
        $user = Auth::user();
        $trainers = Trainer::all();
        return view('admin.trainer', compact('trainers'));
    }
}
