<x-app-layout>
    <div class=" px-4 max-w-2xl lg:py-16 ">

        @if ($gymUser)
            <div
                class=" font-[500px] text-5xl pb-[18px] justify-between pt-[50px] text-light mx-auto container text-yellow-300 w-full flex space-x-2 items-center">
                {{ $gymUser->gym->name }}</div>
            <div class=" text-light mx-auto container w-full mb-6">
                <span class="text-base text-white ">Expiration Date: </span> <span
                    class="text-red-600">{{ $gymUser->expiration_date }}</span>
            </div>
        @endif
        <h2 class="mb-4 text-xl font-bold text-white">My Subscription Details</h2>

        @if ($plan)
            <div>
                {{ $plan->title }}
            </div>

            <div>
                {{ $plan->month }} Month
            </div>

            <div>
                <ul class="list-disc">

                    @foreach ($plan->description as $description)
                        <li>{{ $description }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-app-layout>
