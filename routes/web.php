<?php


use App\Models\Ownerdashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InclusionController;
use App\Http\Controllers\AnnouncementController;


Route::get('/', [HomeController::class, 'home']);

Route::get('/checkin/list', function () {
    return view('/owner/checkin/index');
});
Route::get('/checkin/list/create', function () {
    return view('/owner/checkin/create');
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
        Route::get('/owner/dashboard/', [GymController::class, 'ownerDashboard'])->name('owner.dashboard');
        Route::resource('gyms', GymController::class);
        Route::resource('inclusions', InclusionController::class);
        Route::resource('programs', ProgramController::class);
        Route::get('/customers/{gymUser}/update-status', [CustomerController::class, 'updateStatus'])->name('customer.update-status');


        //check-in users




        Route::resource('customers', CustomerController::class);
        Route::resource('announcements', AnnouncementController::class);
        Route::resource('trainers', TrainerController::class);

        Route::get('/tasks/create-task/', [TaskController::class, 'addTask'])->name('customers.create-task');
        Route::post('/tasks/store-task/', [TaskController::class, 'storeTask'])->name('customers.store-task');
        Route::resource('tasks', TaskController::class);
    });


    Route::get('/showGym/{gym}/subscribe', [GymController::class, 'subscribeGym'])->name('gym.subscribe');
    Route::post('/showGym/{gym}/subscribe', [GymController::class, 'storeSubscription'])->name('subscribe.store');


    //user
    Route::get('user/tasks/show', [TaskController::class, 'viewTask'])->name('user.viewTasks');
    Route::get('/user/announcements/show', [AnnouncementController::class, 'showAnnouncements'])->name('user.announcements');
});

require __DIR__ . '/auth.php';
