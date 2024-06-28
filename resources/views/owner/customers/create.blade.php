<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Create Task</h2>
            <form action="{{ route('customers.store-task') }}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    <div class="mb-5">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Select Workout: </label>
                        <select name="workout" id="workout" x-model="selectedWorkout"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Select...</option>
                            <option :value="workout"></option>
                        </select>
                    </div>
                </div>
                <button type="submit"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Create
                </button>
            </form>
        </div>
    </section>
    <section>

    </section>
</x-app-layout>
