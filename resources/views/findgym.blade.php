<x-guest-layout>

    <form action="{{ route('search.gym') }}" class="max-w-screen-xl mx-auto">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="text" name="query" id="default-search"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search gyms..." required />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
        </div>
    </form>

    <div class="max-w-screen-xl mx-auto p-4 grid grid-cols-4 gap-4">
        @if ($gyms->isEmpty())
            <p class="text-yellow-300 text-3xl">No gyms found.</p>
        @else
            @foreach ($gyms as $gym)
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg object-scale-down h-52 w-96 p-2 "
                            src="{{ asset('storage/' . $gym->image) }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $gym->name }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-600 dark:text-gray-400">{{ $gym->description }}</p>
                        <p class="mb-3 text-sm font-bold text-gray-700 dark:text-gray-400">Subscribed Member:
                            @if (isset($subscriptionCounts[$gym->id]))
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

</x-guest-layout>
