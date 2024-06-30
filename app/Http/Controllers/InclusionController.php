<?php

namespace App\Http\Controllers;


use App\Models\Inclusion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InclusionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();


        $inclusions = Inclusion::whereHas('gym', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
        return view('owner.inclusion.index', compact('inclusions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gyms = Auth::user()->gyms;
        return view('owner.inclusion.create', compact('gyms'));
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

        $inclusion = new Inclusion();

        $inclusion->title = $request->input('title');
        $inclusion->description = $request->input('description');
        //who created the gym
        $inclusion->gym_id = $request->gym_id;
        $inclusion->save();

        return redirect()->route('inclusions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inclusion $inclusion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inclusion $inclusion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inclusion $inclusion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inclusion $inclusion)
    {
        $inclusion->delete();

        return redirect()->route('inclusions.index');
    }
}
