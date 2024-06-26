<style>
    swiper-container {
        width: 100%;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    swiper-slide {
        background-position: center;
        background-size: cover;
        width: 400px;
        height: 500px;
    }

    swiper-slide img {
        display: block;
        width: 100%;
    }
</style>
<x-guest-layout>

    <div class="bg-black">
        <div class="font-[500px] text-7xl pb-[18px] pt-[50px] text-light mx-auto container text-yellow-300 w-full">
            {{ $gym->name }}
        </div>
    </div>
    <swiper-container class="mySwiper" pagination="true" effect="coverflow" grab-cursor="true" centered-slides="true"
        slides-per-view="3" coverflow-effect-rotate="50" coverflow-effect-stretch="0" coverflow-effect-depth="100"
        coverflow-effect-modifier="1" coverflow-effect-slide-shadows="true">
        @for ($i = 0; $i < 4; $i++)
            <swiper-slide>
                <img src=" https://swiperjs.com/demos/images/nature-1.jpg" />
            </swiper-slide>
        @endfor
    </swiper-container>
    <div class="bg-black">
        <div class="font-[500px] text-7xl  pb-[40px] pt-[50px] text-light mx-auto container text-yellow-300 w-full">
            The Best Programs We Offer For You
        </div>
        <div class=" grid grid-cols-4 gap-4 pb-8 mx-auto container ">
            @foreach ($inclusions as $inclusion)
                <div class="border bg-gray-700 rounded-3xl h-[300px] p-4">
                    <h1 class="text-2xl pb-4">
                        {{ $inclusion->title }}
                    </h1>
                    <p class="px-4"> {{ $inclusion->title }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
    <section class="container mx-auto">
        <div class="font-[500px] text-7xl  pb-[40px] pt-[50px] text-light text-yellow-300 w-full">
            Why Should People Choose {{ $gym->name }}
        </div>
        @foreach ($programs as $program)
            <div class="pb-8">
                <h1 class="text-2xl tracking-wide font-bold ">{{ $program->title }}</h1>
                <p class="text-base leading-base px-4">
                    {{ $program->description }}
                </p>
            </div>
        @endforeach
    </section>
    <div class="bg-black flex flex-col">
        <div class="flex container mx-auto justify-between">
            <div>
                <div
                    class=" font-bold text-7xl pb-[18px] pt-[35px] text-light mx-auto container text-yellow-300 w-full">
                    Contact US
                </div>
                <div class="flex ">
                    <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="yellow" class="h-8">
                            <path fill-rule="evenodd"
                                d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="text-3xl pb-[18px] text-light mx-auto container text-yellow-300 w-full">
                        {{ $gym->phone }}
                    </div>
                </div>
                <div class="flex ">
                    <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="yellow" class="h-8 ">
                            <path
                                d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                            <path
                                d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                        </svg>
                    </div>
                    <div class="text-3xl pb-[18px] text-light mx-auto container text-yellow-300 w-full">
                        {{ $gym->email }}
                    </div>
                </div>
                <div class="flex">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="yellow" class="h-8">
                            <path fill-rule="evenodd"
                                d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                clip-rule="evenodd" />
                        </svg>

                    </div>
                    <div class="text-3xl pb-[18px] text-light mx-auto container text-yellow-300 w-full">
                        {{ $gym->address }}
                    </div>
                </div>

            </div>
            <div class="flex">

                <iframe class="p-6"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.4934641617083!2d120.32209777579182!3d16.039862840222074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33915d005112c1c3%3A0x3d56bbabace42b65!2sAnytime%20Fitness%20Dagupan%20City!5e0!3m2!1sen!2sph!4v1719359703501!5m2!1sen!2sph"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>


</x-guest-layout>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
