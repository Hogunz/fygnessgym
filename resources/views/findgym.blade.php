<x-guest-layout>
    <div class="max-w-screen-xl mx-auto p-4 grid grid-cols-4 gap-4">
        @foreach ($gyms as $gym)
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="object-scale-down h-48 w-96 p-2 " src="img/test.png" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $gym->name }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-600 dark:text-gray-400">{{ $gym->description }}</p>
                    <p class="mb-3 text-sm font-bold text-gray-700 dark:text-gray-400">Subscribed Member:@if (isset($subscriptionCounts[$gym->id]))
                            {{ $subscriptionCounts[$gym->id] }}
                        @else
                            0
                        @endif
                    </p>
                    <a href="{{ route('gyms.showGym', $gym) }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white border rounded border-[#623AA5] bg-[#623AA5]  hover:bg-[#623AA5]/75 hover:text-light focus:outline-none focus:ring active:text-opacity-75 transition duration-300 ease-in-out">
                        See more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

</x-guest-layout>
