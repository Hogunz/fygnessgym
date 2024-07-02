<x-app-layout>

    <div class="relative overflow-x-auto container mx-auto pt-24">

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        Gym Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gyms as $gym)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $gym->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $gym->owner }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $gym->phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $gym->address }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $gym->email }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.edit', $gym) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                        <td class="flex items-center px-2 py-4">
                            <form action="{{ route('admin.destroy', $gym) }}" method="post">
                                @csrf
                                @method('delete')
                                <button
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
