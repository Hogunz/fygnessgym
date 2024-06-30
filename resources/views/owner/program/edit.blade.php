<x-app-layout>
    <section class="bg-white mt-5 dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Program</h2>
            <x-input-error :messages="$errors->all()"></x-input-error>
            <form action="{{ route('programs.update', $program->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program
                            Title</label>
                        <input type="text" name="title" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type your program" value="{{ old('title', $program->title) }}" required>
                    </div>

                    <div>
                        <label for="gym_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gym</label>
                        <select name="gym_id" id="gym_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach ($gyms as $gym)
                                <option value="{{ $gym->id }}"
                                    {{ $gym->id == $program->gym_id ? 'selected' : '' }}>{{ $gym->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" name="description" maxlength="150" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Your description here">{{ old('description', $program->description) }}</textarea>
                        <div class="text-sm text-gray-500 dark:text-gray-400 mt-1 text-right">
                            <span id="charCount">0</span>/150 characters
                        </div>
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
    charCount.textContent = textarea.value.length;
</script>
