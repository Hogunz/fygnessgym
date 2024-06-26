<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InclusionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;

Route::get('/', [HomeController::class, 'home']);

//Find A Gym
Route::get('/findgym', function () {
    return view('findgym');
});

Route::resource('gyms', GymController::class);

Route::resource('inclusions', InclusionController::class);
Route::resource('programs', ProgramController::class);
//find a Gym
Route::get('/findgym', [GymController::class, 'findAGym']);
//show Gym
Route::get('/showGym/{gym}', [GymController::class, 'showGym'])->name('gyms.showGym');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
