<x-app-layout>
    <section class=" dark:bg-gray-900">
        <h1
            class="font-[500px] text-7xl pb-[18px] justify-between pt-[50px] text-light mx-auto container text-yellow-300 w-full flex space-x-2 items-center0">
            {{ $gymUser->gym->name }}</h1>
        <div class="py-8 px-4  max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-white">Assign Task</h2>
            <h3 class="mb-4 text-lg font-bold text-white">To: <span
                    class="text-yellow-300">{{ $gymUser->user->name }}</span></h3>

            <form action="{{ route('customers.store-task', $gymUser) }}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    <div class="mb-5">
                        <label for="category" class="block mb-2 text-sm font-medium text-white/75">
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
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Assign Task
                </button>
            </form>
        </div>
    </section>
    <section>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Task
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gymUser->userTasks as $task)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $task->task->workout }} - {{ $task->task->task }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $task->status }}
                        </td>
                        <td class="px-6 py-4 ">
                            @if ($task->status == 'pending')
                                <a class="text-green-600 hover:underline duration-300 ease-in-out"
                                    href="{{ route('customers.update-task', $task) }}">Mark as
                                    Done</a>
                            @endif
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>
</x-app-layout>
