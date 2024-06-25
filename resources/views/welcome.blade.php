<x-guest-layout>

    <div class="font-[500px] text-[42px] pb-[18px] pt-[50px] text-light mx-auto container">Exclusives
    </div>
    <div class="mt-8 mb-8 mx-auto container grid grid-cols-5 gap-6">
        @for ($i = 0; $i < 5; $i++)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <img class="object-scale-down h-48 w-96 p-2 " src="img/test.png" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Fygness Gym
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-600 dark:text-gray-400">Here are the biggest enterprise
                        technology
                        acquisitions of 2021 so far, in reverse chronological order.</p>
                    <p class="mb-3 text-sm font-bold text-gray-700 dark:text-gray-400">Subscribed Member:
                    </p>
                    <a href="#"
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
        @endfor
    </div>
    <section class="container mx-auto">
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
    </section>
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
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-semibold text-light sm:w-8/12">
                        Sharing Is Earning Now
                    </h1>
                    <p class="text-base leading-normal text-light mt-4 sm:mt-5 sm:w-5/12">
                        Great opportunity to make money by
                        advertising your GYM.
                    </p>
                    <button
                        class="hidden sm:flex  py-4 px-8 text-base font-medium text-white mt-8  w-full rounded border border-[#623AA5] bg-[#623AA5]  hover:bg-[#623AA5]/75 hover:text-light focus:outline-none focus:ring active:text-opacity-75 transition duration-300 ease-in-out sm:w-auto">
                        Know More
                    </button>
                </div>
            </section>
        </div>
    </section>
    <section>
        <div class="font-[500px] text-[42px] pb-[18px] text-light mx-auto container">GYM GOERS Stories
        </div>
    </section>
</x-guest-layout>
