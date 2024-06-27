<x-guest-layout>
    <section class="bg-black/50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-yellow-300 uppercase">
                <img class="w-12 h-12 mr-2 rounded-full" src="img/logo.jpg" alt="logo">
                Fygness Gym
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create an account
                    </h1>
                    <form method="POST" action="{{ route('register.user') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>


                        <!-- Phone Number -->
                        <div class="mt-4">
                            <x-input-label for="phone_number" :value="__('Phone Number')" />
                            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                                placeholder="9299021923" :value="old('phone_number')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                        </div>



                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Phone Number -->
                        <div class="mt-4 flex items-center space-x-2">
                            <input type="checkbox" name="owner" id="owner" {{ old('owner') ? 'checked' : '' }}>
                            <x-input-label for="owner" :value="__('Register as owner of a gym?')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="ms-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
