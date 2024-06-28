<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Gym;
use App\Models\Task;
use App\Models\GymUser;
use App\Models\TaskUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Auth::user()->tasks;
        return view('owner.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('owner.task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'workout' => ['required'],
            'task' => ['required'],
            'description' => ['required']
        ]);

        Task::create([
            'owner_id' => Auth::id(),
            'workout' => $request->workout,
            'task' => $request->task,
            'description' => $request->description,
        ]);

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }

    //user
    public function viewTask()
    {
        $user = Auth::user();
        $tasks = collect([]);

        $gymUser = GymUser::where('user_id', $user->id)->where('status', 'approved')->whereDate('expiration_date', '>', Carbon::now()->format('Y-m-d'))->latest()->first();

        if ($gymUser) {
            $tasks = $gymUser->userTasks;
        }

        return view('user.tasks', compact('tasks', 'gymUser'));
    }
    public function addTask(GymUser $gymUser)
    {
        $tasks = Task::where('owner_id', Auth::id())->get();

        return view('owner.customers.create', compact('gymUser', 'tasks'));
    }

    public function storeTask(Request $request, GymUser $gymUser)
    {
        $gymUser->userTasks()->create([
            'task_id' => $request->task_id,
        ]);

        return redirect()->route('customers.create-task', $gymUser);
    }

    public function updateTask(TaskUser $taskUser)
    {
        $taskUser->update([
            'status' => 'done',
        ]);

        return redirect()->route('customers.create-task', $taskUser->gymUser);
    }
}
