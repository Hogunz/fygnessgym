<x-app-layout>
    <div class=" px-4 max-w-2xl lg:py-16 ">

        @if ($gymUser)
            <div
                class=" font-[500px] text-5xl pb-[18px] justify-between pt-[50px] text-light mx-auto container text-yellow-300 w-full flex space-x-2 items-center">
                {{ $gymUser->gym->name }}</div>
            <div class=" text-light mx-auto container w-full mb-6">
                <span class="text-base text-white ">Expiration Date: </span> <span
                    class="text-red-600">{{ $gymUser->expiration_date }}</span>
            </div>
        @endif
        <h2 class="mb-4 text-xl font-bold text-white">My Tasks</h2>

        @foreach ($tasks as $task)
            <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg mb-4 p-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $task->task->workout }} -
                    <span>{{ $task->task->task }}</span>
                </h3>
                <p class="text-gray-700 dark:text-gray-300">{{ $task->task->description }}</p>
                <p class="text-gray-700 dark:text-gray-300">{{ $task->status }}</p>
            </div>
        @endforeach

        @if ($tasks->isEmpty())
            <p class="text-gray-700 dark:text-gray-300">No tasks found.</p>
        @endif
    </div>
</x-app-layout>
