<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Gym;
use App\Models\Plan;
use App\Models\GymUser;
use App\Models\Program;
use App\Models\Inclusion;
use Faker\Provider\Lorem;
use App\Models\Announcement;
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
            'google_map_link' => 'nullable|string',
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
        $gym->google_map_link = $request->input('google_map_link');
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
        return view('owner.edit', compact('gym'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gym $gym)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
            'owner' => 'required',
            'description' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image',
            'google_map_link' => 'nullable|string',
        ]);

        DB::beginTransaction();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gym', 'public');
            $gym->image = $imagePath;
        }

        $gym->name = $request->input('name');
        $gym->owner = $request->input('owner');
        $gym->description = $request->input('description');
        $gym->email = $request->input('email');
        $gym->address = $request->input('address');
        $gym->phone = $request->input('phone');
        $gym->google_map_link = $request->input('google_map_link');
        $gym->save();

        if ($request->hasFile('gallery')) {
            $data = [];
            foreach ($request->file('gallery') as $gallery) {
                $data[] = ['image_path' => $gallery->store($gym->name, 'public')];
            }

            $gym->galleries()->createMany($data);
        }

        DB::commit();

        return redirect()->route('gyms.index');
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
        $subscriptionCounts = [];
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
        return view('gym.subscribe', compact('gym'));
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
        return redirect()->route('dashboard')->with([

            'subscriptionCount' => $subscriptionCount,
            'successMessage' => 'Subscription created successfully!',

        ]);
    }


    public static function ownerDashboard(Gym $gym)
    {

        $userId = auth()->id();
        $announcementCount = Announcement::whereHas('gym', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();
        $currentDate = Carbon::now();
        $subscribedUsersCount = GymUser::where('expiration_date', '>', $currentDate)->count();
        $pendingUsersCount = GymUser::where('status', 'pending')->count();

        return view('owner.dashboard', compact('pendingUsersCount', 'subscribedUsersCount', 'announcementCount'));
    }
    public function showAdminGym()
    {
        $gyms = Gym::all();
        return view('admin.gyms', compact('gyms'));
    }
    public function searchGym(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $gyms = Gym::where('name', 'like', '%' . $query . '%')->get();
        } else {
            $gyms = Gym::all();
        }

        return view('findgym', compact('gyms', 'query'));
    }

    public function viewSubscription()
    {
        $user = Auth::user();
        $gymUser = GymUser::where('user_id', $user->id)->where('status', 'approved')->whereDate('expiration_date', '>', Carbon::now()->format('Y-m-d'))->latest()->first();

        $plan = [];

        if ($gymUser) {

            $plan = Plan::where('gym_id', $gymUser->gym_id)->where('month', $gymUser->plan)->first();
        }

        return view('user.subscription', compact('gymUser', 'plan'));
    }
}
