<x-app-layout>
    <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
        <h4 class="text-xl text-gray-900 font-bold">Activity Log</h4>
        <div class="relative px-4">
            <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>

            @foreach ($activities as $activity)
                <div class="flex items-center w-full my-6 -ml-1.5">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-yellow-300 rounded-full"></div>
                    </div>
                    <div class="w-11/12">
                        <p class="text-sm">
                            <span>{{ $activity->user->name }}</span> has
                            <span>{{ strtolower($activity->activity) }}</span>.
                        </p>
                        <p class="text-xs text-gray-500">{{ $activity->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
