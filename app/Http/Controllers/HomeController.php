<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\GymUser;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $gyms = Gym::all();
        $subscriptionCounts = [];

        // Loop through each gym to count subscriptions
        foreach ($gyms as $gym) {
            $subscriptionCounts[$gym->id] = GymUser::where('gym_id', $gym->id)->count();
        }
        return view('welcome', compact('gyms', 'subscriptionCounts'));
    }
}
