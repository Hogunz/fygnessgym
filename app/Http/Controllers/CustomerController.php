<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Gym;
use App\Models\Task;
use App\Models\User;
use App\Models\GymUser;
use App\Models\Customer;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gymIds = Gym::where('user_id', Auth::id())->get()->pluck('id');

        $customers = GymUser::whereIn('gym_id', $gymIds)->get();

        // foreach ($gyms as $gym) {
        //     foreach ($gym->customers as $customer) {
        //         $expirationDate = Carbon::parse($customer->pivot->expiration_date);
        //         $isExpired = Carbon::now()->greaterThan($expirationDate);
        //         $status = $customer->pivot->status;
        //         if (!$isExpired || $status == 'pending') {
        //             $customers[] = [
        //                 'id' => $customer->id,
        //                 'name' => $customer->name,
        //                 'phone_number' => $customer->phone_number,
        //                 'expiration_date' => $customer->pivot->expiration_date,
        //                 'gym_id' => $gym->id,
        //                 'gym_name' => $gym->name,
        //                 'plan' => $customer->pivot->plan,
        //                 'status' => $status,
        //             ];
        //         }
        //     }
        // }

        return view('owner.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function updateStatus(Request $request, GymUser $gymUser)
    {
        $gymUser->update([
            'status' => $request->status,
            'expiration_date' => $request->status == 'rejected' ? null : Carbon::now()->addMonth($gymUser->plan),
        ]);

        return back();
    }
    public function usersIndex()
    {
        $gymIds = Gym::where('user_id', Auth::id())->pluck('id');

        $approvedUsers = GymUser::whereIn('gym_id', $gymIds)->where('status', 'approved')->whereDate('expiration_date', '>', Carbon::now()->format('Y-m-d'))->get();

        // Fetch checked-in users
        $checkedInUsers = Attendance::where('owner_id', Auth::id())->latest()->get();

        return view('owner.checkin.index', compact('approvedUsers', 'checkedInUsers'));
    }
    public function markAttendance(Request $request)
    {
        $customer = GymUser::findOrFail($request->gym_user_id);

        $checkIfUserAlreadyCheckedIn = Attendance::where('gym_id', $customer->gym_id)
            ->where('user_id', $customer->user_id)
            ->whereDate('created_at', Carbon::now()->format('Y-m-d'))
            ->first();

        if (!$checkIfUserAlreadyCheckedIn) {
            Attendance::create([
                'owner_id' => Auth::id(),
                'user_id' => $customer->user_id,
                'gym_id' => $customer->gym_id,
            ]);

            $customer->update([
                'last_checkin' => Carbon::now(),
            ]);

            return redirect()->route('customers.check-in')->with(['message' => 'Success!']);
        }

        return redirect()->route('customers.check-in')->with(['message' => "User already checked in"]);
    }
}
