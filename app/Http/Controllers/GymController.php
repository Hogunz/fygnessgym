<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Gym;
use App\Models\GymUser;
use App\Models\Program;
use App\Models\Inclusion;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GymController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gyms = Auth::user()->gyms;
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
            'description' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'gallery' => 'required|array',
            'gallery.*' => 'image',
        ]);

        $imagePath = $request->file('image')->store('gym', 'public');

        DB::beginTransaction();
        $gym = new Gym;
        $gym->name = $request->input('name');
        $gym->image = $imagePath;
        $gym->owner = $request->input('owner');
        $gym->description = $request->input('description');
        $gym->email = $request->input('email');
        $gym->address = $request->input('address');
        $gym->phone = $request->input('phone');
        //who created the gym
        $gym->user_id = Auth::id();

        $gym->save();
        $data = [];
        foreach ($request->file('gallery') as $gallery) {
            $data[] = ['image_path' => $gallery->store($gym->name, 'public')];
        }

        $gym->galleries()->createMany($data);

        DB::commit();

        return redirect()->route('gyms.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Gym $gym)
    {
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


    public function findAGym()
    {
        $gyms = Gym::all();
        foreach ($gyms as $gym) {
            $subscriptionCounts[$gym->id] = GymUser::where('gym_id', $gym->id)->count();
        }
        return view('findgym', compact('gyms', 'subscriptionCounts'));
    }
    public function showGym(Gym $gym)
    {
        $inclusions = Inclusion::where('gym_id', $gym->id)->get();
        $programs = Program::where('gym_id', $gym->id)->get();
        return view('gym.show', compact('gym', 'inclusions', 'programs'));
    }

    public function subscribeGym(Gym $gym)
    {
        $plans = [
            [
                'name' => 'Bronze',
                'month' => 1,
                'description' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos iure tempore atque veritatis ex corrupti molestiae cumque sapiente dolorem mollitia. Officia possimus iste doloremque nulla error nesciunt impedit nam ipsum."
            ],
            [
                'name' => 'Silver',
                'month' => 3,
                'description' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos iure tempore atque veritatis ex corrupti molestiae cumque sapiente dolorem mollitia. Officia possimus iste doloremque nulla error nesciunt impedit nam ipsum."
            ],
            [
                'name' => 'Gold',
                'month' => 5,
                'description' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos iure tempore atque veritatis ex corrupti molestiae cumque sapiente dolorem mollitia. Officia possimus iste doloremque nulla error nesciunt impedit nam ipsum."
            ],
        ];
        return view('gym.subscribe', compact('gym', 'plans'));
    }

    public function storeSubscription(Request $request, Gym $gym)
    {
        $user = Auth::user();

        // $user->subscribeGym()->attach([$gym->id => ['plan' => $request->month]]);
        GymUser::create([
            'gym_id' => $gym->id,
            'user_id' => $user->id,
            'plan' => $request->month,
        ]);
        $subscriptionCount = GymUser::where('gym_id', $gym->id)->count();
        return redirect()->route('dashboard')->with('subscriptionCount', $subscriptionCount);
    }
}
