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
            @for ($i = 0; $i < 4; $i++)
                <div class="border bg-gray-700 rounded-3xl h-[500px]">
                    Strength Training
                </div>
            @endfor
        </div>
    </div>
    <section class="container mx-auto">
        <div class="font-[500px] text-7xl  pb-[40px] pt-[50px] text-light text-yellow-300 w-full">
            Why Should People Choose (name of the Gym)
        </div>
        @for ($i = 0; $i < 4; $i++)
            <div class="pb-8">
                <h1 class="text-2xl tracking-wide font-bold ">Personal Training</h1>
                <p class="text-base leading-base px-4">
                    Lowaeawjkdhawjkdhakwjdhajkwdhajkwhdjkawhd
                </p>
            </div>
        @endfor
    </section>
    <div class="bg-black">
        <div
            class="font-[500px] font-bold text-3xl pb-[18px] pt-[35px] text-light mx-auto container text-yellow-300 w-full">
            Contact US
        </div>
        <div class="font-[500px] text-base pb-[18px] text-light mx-auto container text-yellow-300 w-full">
            {{ $gym->phone }}
        </div>
        <div class="font-[500px] text-base pb-[18px] text-light mx-auto container text-yellow-300 w-full">
            {{ $gym->email }}
        </div>
        <div class="font-[500px] text-base pb-[18px] text-light mx-auto container text-yellow-300 w-full">
            {{ $gym->address }}
        </div>
    </div>


</x-guest-layout>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
