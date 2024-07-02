<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Trainer</h2>
            <x-input-error :messages="$errors->all()"></x-input-error>
            <form action="{{ route('admin.updateUser', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" value={{ $user->name }}
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ex. Juan Dela Cruz" required="">
                    </div>
                    <div class="flex mb-5">
                        <span class="inline-block py-2 px-4 bg-gray-200 border border-gray-300 border-r-0">+63</span>
                        <input id="phone_number" class="block w-full py-2 px-4 border border-gray-300 rounded-r"
                            type="text" name="phone_number" placeholder="0000000000" maxlength="10"
                            :value="old('phone_number')" required autocomplete="username" />
                    </div>
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>
                <button type="submit"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Update
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
