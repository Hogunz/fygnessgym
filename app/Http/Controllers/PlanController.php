<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::all();
        return view('owner.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gyms = Gym::all();

        return view('owner.plans.create', compact('gyms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $validatedData = $request->validate([
            'gym_id' => ['required'],
            'month' => ['required', 'unique:plans,month'],
            'title' => ['required'],
            'description' => ['required', 'array']
        ]);

        $descriptions = array_filter($request->description);
        $validatedData['description'] = $descriptions;

        Plan::create($validatedData);

        return redirect()->route('plans.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        return view('owner.plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        $validatedData = $request->validate([
            'gym_id' => ['required'],
            'month' => ['required'],
            'title' => ['required'],
            'description' => ['required', 'array']
        ]);

        $plan->update($validatedData);

        return redirect()->route('plans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();

        return redirect()->route('plans.index');
    }
}
