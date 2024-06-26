<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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

        Auth::login($user);

        if ($user->doesntHave('roles')) {
            return redirect('/');
        }

        return redirect()->route('dashboard');
    }
}
