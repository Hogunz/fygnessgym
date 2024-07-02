<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\User;
use App\Models\Trainer;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $gyms = Gym::all();
        return view('admin.gyms', compact('gyms'));
    }


    public function edit(Gym $gym)
    {
        return view('admin.editGym', compact('gym'));
    }

    public function show()
    {
    }
    public function update(Request $request, Gym $gym)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'owner' => 'required',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);



        DB::beginTransaction();

        $gym->name = $request->input('name');
        $gym->owner = $request->input('owner');
        $gym->email = $request->input('email');
        $gym->address = $request->input('address');
        $gym->phone = $request->input('phone');
        //who created the gym

        $gym->save();

        DB::commit();
        return redirect()->route('admin.index');
    }

    public function destroy(Gym $gym)
    {
        $gym->delete();

        return redirect()->route('admin.index');
    }
    public function adminDashboard()
    {

        $usersCount = User::count();
        $announcementsCount = Announcement::count();
        $trainersCount = Trainer::count();
        $gymsCount = Gym::count();
        return view('admin.dashboard', compact('usersCount', 'announcementsCount', 'trainersCount', 'gymsCount'));
    }



    //edit and update
    public function editTrainer(Trainer $trainer)
    {

        return view('admin.editTrainer', compact('trainer'));
    }
    public function updateTrainer(Request $request, Trainer $trainer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        $trainer->name = $request->input('name');
        $trainer->position = $request->input('position');

        $trainer->save();

        return redirect()->route('admin.showStaff');
    }
    public function editUser(User $user)
    {
        return view('admin.editUser', compact('user'));
    }
    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|regex:/^[0-9]+$/|max:11|digits:10',
        ]);
        DB::beginTransaction();
        $user->name = $request->input('name');
        $user->phone_number = '+63' . $request->input('phone_number');
        $user->save();
        DB::commit();
        return redirect()->route('admin.showUser');
    }

    public function editAnnouncement(Announcement $announcement)
    {
        return view('admin.editAnnouncement', compact('announcement'));
    }
    public function updateAnnouncement(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $announcement->title = $request->input('title');
        $announcement->description = $request->input('description');
        $announcement->save();

        return redirect()->route('admin.showAnnouncement');
    }

    //Delete
    public function deleteAnnouncement(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('admin.showAnnouncement');
    }
    public function deleteTrainer(Trainer $trainer)
    {
        $trainer->delete();

        return redirect()->route('admin.showStaff');
    }
    public function deleteUser(User $user)
    {
        $user->delete();

        return redirect()->route('admin.showUser');
    }
}
