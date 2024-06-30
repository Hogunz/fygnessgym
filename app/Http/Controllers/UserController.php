<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\User;
use App\Models\Trainer;
use App\Models\ActivityLog;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public function registerUser()
    {
        return view('register.user');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'email' => ['email', 'required'],
            'phone_number' => ['required', 'size:10'],
            'owner' => ['nullable'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => '+63' . $request->phone_number,
            'password' => Hash::make($request->password),
        ]);

        if ($request->filled('owner')) {
            $user->assignRole('owner');
        }

        event(new Registered($user));
        // Log the activity
        $activityLog = ActivityLog::create([
            'user_id' => $user->id,
            'activity' => 'Registered',
            'details' => $user->name . ' has Registered',
        ]);


        Auth::login($user);

        if ($user->doesntHave('roles')) {
            return redirect('/');
        }

        return redirect()->route('dashboard');
    }
    public function showUser()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }
    public function adminDashboard()
    {
        $usersCount = User::count();
        $announcementsCount = Announcement::count();
        $trainersCount = Trainer::count();
        $gymsCount = Gym::count();
        return view('admin.dashboard', compact('usersCount', 'announcementsCount', 'trainersCount', 'gymsCount'));
    }
    public function showActivityLog()
    {
        $activities = ActivityLog::with('user')->latest()->get();
        return view('admin.activitylog', compact('activities'));
    }
}
