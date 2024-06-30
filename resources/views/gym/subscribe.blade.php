<x-guest-layout>
    <section class="bg-gray-600 dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-white">
                    Designed for <span class="text-yellow-300">fitness</span> seekers like you</h2>
                <p class="mb-5 font-light sm:text-xl text-white">we focus on tailored fitness
                    solutions where technology, innovation, and a supportive community unlock long-term health benefits
                    and personal growth.
                </p>
            </div>
            <div class="lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">

                @foreach ($plans as $plan)
                    <div
                        class="flex flex-col p-6 mx-auto max-w-lg text-center border-transparent bg-gray-700 text-white rounded-3xl h-full">
                        <h3 class="mb-4 text-2xl font-semibold">{{ $plan['name'] }}</h3>
                        <p class="font-light sm:text-lg text-white">{{ $plan['description'] }}</p>
                        <div class="flex justify-center items-baseline my-8">
                            <span class="mr-2 text-5xl font-extrabold">{{ $plan['month'] }}</span>
                            <span class="text-white">/month</span>
                        </div>

                        <form action="{{ route('subscribe.store', ['gym' => $gym->id, 'month' => $plan['month']]) }}"
                            method="POST">
                            @csrf
                            <button type="submit"
                                class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-yellow-500 to-yellow-500 group-hover:from-yellow-500 group-hover:to-yellow-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 ">
                                <span
                                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    Subscribe
                                </span>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>
