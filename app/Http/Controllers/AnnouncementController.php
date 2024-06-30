<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();

        $announcements = Announcement::whereHas('gym', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
        return view('owner.announcement.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gyms = Auth::user()->gyms;
        return view('owner.announcement.create', compact('gyms'));
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

        $announcement = new Announcement();

        $announcement->title = $request->input('title');
        $announcement->description = $request->input('description');
        //who created the gym
        $announcement->gym_id = $request->gym_id;
        $announcement->save();

        return redirect()->route('announcements.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        //
    }

    public function showAnnouncements()
    {
        $user = Auth::user();

        $gymOwnersId = $user->subscribeGym->pluck('id');

        $announcements = Announcement::whereIn('gym_id', $gymOwnersId)->get();

        return view('user.announcement', compact('announcements'));
    }
    public function showAnnouncement()
    {
        $announcements = Announcement::all();
        return view('admin.announcement', compact('announcements'));
    }
}
