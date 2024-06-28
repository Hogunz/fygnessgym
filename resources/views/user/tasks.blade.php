<x-app-layout>
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">My Tasks</h2>

        @if ($gymUser)
            <div>{{ $gymUser->gym->name }}</div>
            <div>{{ $gymUser->expiration_date }}</div>
        @endif

        @foreach ($tasks as $task)
            <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg mb-4 p-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $task->task->workout }}</h3>
                <p class="text-gray-700 dark:text-gray-300">{{ $task->task->task }}</p>
                <p class="text-gray-700 dark:text-gray-300">{{ $task->task->description }}</p>
                <p class="text-gray-700 dark:text-gray-300">{{ $task->status }}</p>
            </div>
        @endforeach

        @if ($tasks->isEmpty())
            <p class="text-gray-700 dark:text-gray-300">No tasks found.</p>
        @endif
    </div>
</x-app-layout>
