<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Assign Task</h2>
            <div>{{ $gymUser->user->name }}</div>
            <div>{{ $gymUser->gym->name }}</div>

            <form action="{{ route('customers.store-task', $gymUser) }}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    <div class="mb-5">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Select Workout: </label>
                        <select name="task_id" id="task_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Select...</option>
                            @foreach ($tasks as $task)
                                <option value="{{ $task->id }}">{{ $task->workout }} - {{ $task->task }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Assign Task
                </button>
            </form>
        </div>
    </section>
    <section>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gymUser->userTasks as $task)
                    <tr>
                        <td>{{ $task->task->workout }} - {{ $task->task->task }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            @if ($task->status == 'pending')
                                <a href="{{ route('customers.update-task', $task) }}">Mark as Done</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</x-app-layout>
