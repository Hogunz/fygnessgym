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
use App\Http\Controllers\PlanController;
use App\Models\Announcement;

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
Route::get('/searchGym', [GymController::class, 'searchGym'])->name('search.gym');
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
        Route::get('/owner/dashboard', [GymController::class, 'ownerDashboard'])->name('owner.dashboard');
        Route::resource('gyms', GymController::class);
        Route::resource('inclusions', InclusionController::class);
        Route::resource('programs', ProgramController::class);
        Route::get('/customers/{gymUser}/update-status', [CustomerController::class, 'updateStatus'])->name('customer.update-status');

        Route::resource('plans', PlanController::class);

        //check-in users
        Route::get('/users-index', [CustomerController::class, 'usersIndex'])->name('customers.check-in');
        Route::post('/mark-attendance', [CustomerController::class, 'markAttendance'])->name('customers.mark-attendance');

        Route::resource('customers', CustomerController::class);
        Route::resource('announcements', AnnouncementController::class);

        Route::resource('trainers', TrainerController::class);

        Route::get('/tasks/create-task/{gymUser}', [TaskController::class, 'addTask'])->name('customers.create-task');
        Route::post('/tasks/create-task/{gymUser}', [TaskController::class, 'storeTask'])->name('customers.store-task');
        Route::get('/tasks/update-task/{taskUser}', [TaskController::class, 'updateTask'])->name('customers.update-task');

        Route::resource('tasks', TaskController::class);
    });

    Route::get('/showGym/{gym}/subscribe', [GymController::class, 'subscribeGym'])->name('gym.subscribe');
    Route::post('/showGym/{gym}/subscribe', [GymController::class, 'storeSubscription'])->name('subscribe.store');
    //admin
    Route::get('/showStaff', [TrainerController::class, 'showStaff'])->name('admin.showStaff');
    Route::get('/showUser', [UserController::class, 'showUser'])->name('admin.showUser');
    Route::get('/showAnnouncement', [AnnouncementController::class, 'showAnnouncement'])->name('admin.showAnnouncement');
    Route::get('/showGym', [GymController::class, 'showAdminGym'])->name('admin.showGym');
    Route::get('/activity-log', [UserController::class, 'showActivityLog'])->name('admin.showActivityLog');
    //admin dashboard
    Route::get('/admin/dashboard/', [UserController::class, 'adminDashboard'])->name('admin.dashboard');

    //user
    Route::get('user/tasks/show', [TaskController::class, 'viewTask'])->name('user.viewTasks');
    Route::get('/user/announcements/show', [AnnouncementController::class, 'userAnnouncements'])->name('user.announcements');
    Route::get('/user/gym-subscription', [GymController::class, 'viewSubscription'])->name('user.viewSubscription');
});

require __DIR__ . '/auth.php';
