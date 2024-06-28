<x-app-layout>
    <div class="relative overflow-x-auto container mx-auto pt-24">
        <form action="{{ route('customers.mark-attendance') }}" method="post">
            @csrf
            <div class="mb-5">
                <select name="gym_user_id" id="gym_user_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-48 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="">Select User</option>
                    @foreach ($approvedUsers as $user)
                        <option value="{{ $user->id }}">{{ $user->user->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Check In
            </button>
        </form>


        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-8">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">User</th>
                    <th scope="col" class="px-6 py-3">Gym</th>
                    <th scope="col" class="px-6 py-3">Check-in Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($checkedInUsers as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->id }}</th>
                        <td class="px-6 py-4">{{ $user->customer->name }}</td>
                        <td class="px-6 py-4">{{ $user->gym->name }}</td>
                        <td class="px-6 py-4">
                            {{ $user->created_at->format('F d, Y') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
