<x-app-layout>
    <div class="relative overflow-x-auto container mx-auto pt-24">
        <table class="bg-white w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Gym
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Full Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Expiration
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Plan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr class="text-black">
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $customer->gym->name }}</th>
                        <td class="px-6 py-4">{{ $customer->user->name }}</td>
                        <td class="px-6 py-4">{{ $customer->user->phone_number }}</td>
                        <td class="px-6 py-4">{{ $customer->expiration_date }}</td>
                        <td class="px-6 py-4">{{ $customer->plan }} Month/s</td>
                        <td class="px-6 py-4">{{ $customer->status }}</td>
                        <td class="px-6 py-4">
                            @if ($customer->status == 'pending')
                                <a
                                    href="{{ route('customer.update-status', ['gymUser' => $customer['id'], 'status' => 'approved']) }}">Approve</a>
                                <a
                                    href="{{ route('customer.update-status', ['gymUser' => $customer['id'], 'status' => 'rejected']) }}">Reject</a>
                            @endif
                            <a class="hover:underline text-green-600"
                                href="{{ route('customers.create-task', $customer->id) }}">Assign Task</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
