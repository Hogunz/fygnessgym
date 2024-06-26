<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InclusionController;

Route::get('/', [HomeController::class, 'home']);

Route::get('/users/list', function () {
    return view('/owner/users/index');
});
Route::get('/checkin/list', function () {
    return view('/owner/checkin/index');
});
Route::get('/announcement', function () {
    return view('/owner/announcement/index');
});
Route::get('/announcement/create', function () {
    return view('/owner/announcement/create');
});



Route::get('/register/user', [UserController::class, 'registerUser'])->name("register.user");
Route::post('/register/user', [UserController::class, 'store'])->name('register.store');

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
    //Gym
    Route::group(['middleware' => ['role:owner']], function () {
        Route::resource('gyms', GymController::class);
        Route::resource('inclusions', InclusionController::class);
        Route::resource('programs', ProgramController::class);
        Route::resource('customers', CustomerController::class);
    });

    Route::get('/showGym/{gym}/subscribe', [GymController::class, 'subscribeGym'])->name('gym.subscribe');
    Route::get('/showGym/{gym}/subscribe/store', [GymController::class, 'storeSubscription'])->name('subscribe.store');
});

require __DIR__ . '/auth.php';
