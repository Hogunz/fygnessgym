<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GymController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gyms = Gym::all();
        return view('owner.index', compact('gyms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('owner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image',
            'owner' => 'required',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'inclusions' => 'required|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('public');
        $imageName = basename($imagePath);

        $gym = new Gym;
        $gym->name = $request->input('name');
        $gym->image = $imageName;
        $gym->owner = $request->input('owner');
        $gym->email = $request->input('email');
        $gym->address = $request->input('address');
        $gym->phone = $request->input('phone');
        $gym->inclusions = $request->input('inclusions');
        //who created the gym
        $gym->user_id = Auth::id();
        $gym->save();

        return redirect()->route('gyms.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Gym $gym)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gym $gym)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gym $gym)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gym $gym)
    {
        //
    }
}
