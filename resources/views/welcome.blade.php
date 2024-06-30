<x-guest-layout>




    <div class="mx-auto container flex justify-center items-center  px-4 sm:px-6 2xl:px-0 pt-24 pb-12">
        <div class="flex flex-col lg:flex-row justify-center items-center">
            <div class="w-full flex flex-col justify-start items-start">
                <div>
                    <p class="text-4xl sm:text-5xl lg:text-6xl font-semibold text-white ">Welcome to
                        <span class="text-yellow-300"> Fygness Go</span>
                    </p>
                </div>
                <div class="mt-4 lg:w-4/5 ">
                    <p class="text-base leading-6 text-white"> "Fygness Go: Find Your Gym and Fitness
                        Goal! Navigate effortlessly to your ideal gym and work on your fitness objectives with
                        precision. Let Fygness Go be the way to find your ultimate fitness destination!"</p>
                </div>
            </div>

            <div class="columns-2 max-w-2xl">
                <div class="">
                    <img class="hidden lg:block h-full w-full " src="img/logo/4.png" alt="gym" />
                    <img class="w-80 sm:w-auto lg:hidden" src="img/logo/4.png" alt="gym" />
                </div>
                <div class="flex flex-col justify-center items-center gap-y-4">
                    <div class="">
                        <img class="hidden lg:block h-full w-full" src="img/logo/3.png" alt="chairs" />
                        <img class="w-80 sm:w-auto lg:hidden" src="img/logo/3.png" alt="chairs" />
                    </div>
                    <div>
                        <img class="hidden lg:block h-full w-full" src="img/logo/2.png" alt="chairs" />
                        <img class="w-80 sm:w-auto lg:hidden" src="img/logo/2.png" alt="chairs" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="font-[500px] text-[42px] pb-[18px] pt-[50px] text-light mx-auto container text-white">Exclusives
    </div>
    <div id="gyms" class="mt-8 mb-8 mx-auto container grid grid-cols-5 gap-6">
        @foreach ($gyms as $gym)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <img class="object-scale-down h-48 w-96 p-2" src="{{ asset('storage/' . $gym->image) }}"
                        alt="gym" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $gym->name }}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-600 dark:text-gray-400">{{ $gym->description }}</p>
                    <p class="mb-3 text-sm font-bold text-gray-700 dark:text-gray-400">Subscribed Member: @if (isset($subscriptionCounts[$gym->id]))
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
    {{-- <section class="container mx-auto">
        <div class="font-[500px] text-[42px] pt-[28px] pb-[4px] text-light mx-auto container">Trending Gym Places
        </div>
        <div class="mt-8 mb-8 mx-auto container grid grid-cols-4 gap-6">
            @for ($i = 0; $i < 4; $i++)
                <div>
                    <a href="">
                        <div class="flex flex-col">
                            <div class="mb-8">

                                <img class="w-[386.641] h-[386.641] object-cover bg-cover rounded-lg"
                                    src="https://images.unsplash.com/photo-1579616075377-696d66a6e373?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
                            </div>
                            <div class="text-[16px] leading-[24px] font-[300px] text-light font-brandon">
                                asdasd
                            </div>
                        </div>
                    </a>
                </div>
            @endfor
        </div>
    </section> --}}
    <section class=" container mx-auto ">
        <div class="flex items-center py-9 md:py-12 lg:py-24">
            <section class="bg-cover bg-center py-32 w-full rounded-lg"
                style="
        background-image: linear-gradient(to right, #3f2321, transparent), url('/img/banner-2.png');
        background-repeat: no-repeat;
        background-size: cover;
    ">
                <div
                    class=" z-10 top-0 left-0 mx-4 sm:mx-0 mt-36 sm:mt-0 max-w-5xl sm:pl-14 flex flex-col sm:justify-start items-start">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-semibold text-yellow-300 sm:w-8/12">
                        Sharing Is Earning Now
                    </h1>
                    <p class="text-base leading-normal text-white mt-4 sm:mt-5 sm:w-5/12">
                        Great opportunity to make money by
                        advertising your GYM.
                    </p>
                    @guest
                        <a href="/login" class="href">
                            <button
                                class="hidden sm:flex  py-4 px-8 text-base font-medium text-white mt-8  w-full rounded border border-[#623AA5] bg-[#623AA5]  hover:bg-[#623AA5]/75 hover:text-light focus:outline-none focus:ring active:text-opacity-75 transition duration-300 ease-in-out sm:w-auto">
                                Know More
                            </button>
                        </a>
                    @endguest
                </div>
            </section>
        </div>
    </section>

</x-guest-layout>

<section>
    <script>
        const MenuHandler = (flag) => {
            if (flag) {
                document.getElementById("list").classList.add("top-100");
                document.getElementById("list").classList.remove("hidden");
                document.getElementById("close").classList.remove("hidden");
                document.getElementById("open").classList.add("hidden");
            } else {
                document.getElementById("list").classList.remove("top-100");
                document.getElementById("list").classList.add("hidden");
                document.getElementById("close").classList.add("hidden");
                document.getElementById("open").classList.remove("hidden");
            }
        };
    </script>
