<x-app-layout>
    <div class="relative overflow-x-auto container mx-auto pt-24">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                    <tr>
                        <td>{{ $customer->gym->name }}</td>
                        <td>{{ $customer->user->name }}</td>
                        <td>{{ $customer->user->phone_number }}</td>
                        <td>{{ $customer->expiration_date }}</td>
                        <td>{{ $customer->plan }} Month/s</td>
                        <td>{{ $customer->status }}</td>
                        <td>
                            @if ($customer->status == 'pending')
                                <a
                                    href="{{ route('customer.update-status', ['gymUser' => $customer['id'], 'status' => 'approved']) }}">Approve</a>
                                <a
                                    href="{{ route('customer.update-status', ['gymUser' => $customer['id'], 'status' => 'rejected']) }}">Reject</a>
                            @endif
                            <a href="{{ route('customers.addTask') }}">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
