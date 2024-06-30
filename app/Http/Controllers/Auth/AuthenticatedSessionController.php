<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        // Log the login activity
        ActivityLog::create([
            'user_id' => $user->id,
            'activity' => 'Logged In',
            'details' => $user->name . ' has Logged In',
        ]);


        if (Auth::user()->doesntHave('roles')) {
            return redirect('/');
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();

        // Log the logout activity before logout
        ActivityLog::create([
            'user_id' => $user->id,
            'activity' => 'Logged Out',
            'details' => $user->name . ' has Logged Out',
        ]);
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
