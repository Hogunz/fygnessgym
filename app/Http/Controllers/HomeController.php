<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $gyms = Gym::all();
        return view(
            'welcome',
            compact('gyms')

        );
    }
}
