    <x-app-layout>


        <section class="bg-white mt-5 dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16  ">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new plan</h2>
                <x-input-error :messages="$errors->all()"></x-input-error>
                <form action="{{ route('plans.store') }}" method="post">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plan</label>
                            <input type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type your package title" required="">
                        </div>

                        <div>
                            <label for="gym"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gym</label>
                            <select name="gym_id" id="gym"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @foreach ($gyms as $gym)
                                    <option value="{{ $gym->id }}">{{ $gym->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="month"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Month
                                Subscription</label>
                            <select name="month" id="month"
                                class="bg-gray-50 border border-g
                            ray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="1">1 Month</option>
                                <option value="3">3 Month</option>
                                <option value="5">5 Month</option>

                            </select>
                        </div>
                    </div>

                    <div id="descriptions" class="mt-3">
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descriptions
                        </label>
                        <div>
                            <input type="text" class="block w-full" name="description[]"
                                placeholder="Type your description">
                            <input type="text" class="block w-full" name="description[]"
                                placeholder="Type your description">
                            <input type="text" class="block w-full" name="description[]"
                                placeholder="Type your description">
                            <input type="text" class="block w-full" name="description[]"
                                placeholder="Type your description">
                            <input type="text" class="block w-full" name="description[]"
                                placeholder="Type your description">
                            <input type="text" class="block w-full" name="description[]"
                                placeholder="Type your description">
                        </div>
                    </div>

                    <button type="submit"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                        Submit
                    </button>
                </form>
            </div>
        </section>

    </x-app-layout>
    <script>
        const textarea = document.getElementById('description');
        const charCount = document.getElementById('charCount');

        textarea.addEventListener('input', function() {
            charCount.textContent = textarea.value.length;
        });
    </script>
