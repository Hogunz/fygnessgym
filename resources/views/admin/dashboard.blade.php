<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 pt-20">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold text-red-600">{{ $usersCount }}</div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">User List</div>
                </div>
            </div>

        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-4">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold text-red-600">{{ $trainersCount }}</div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Staff/Trainer List</div>
                </div>
            </div>

        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="text-2xl font-semibold mb-1 text-red-600">{{ $announcementsCount }}</div>
                    <div class="text-sm font-medium text-gray-400">Number of Announcements Created</div>
                </div>
            </div>

        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="text-2xl font-semibold mb-1 text-red-600">{{ $gymsCount }}</div>
                    <div class="text-sm font-medium text-gray-400">Registered Gyms</div>
                </div>
            </div>

        </div>
    </div>




</x-app-layout>
