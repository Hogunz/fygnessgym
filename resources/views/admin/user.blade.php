 <x-app-layout>
     <div class="relative overflow-x-auto container mx-auto pt-24">
         <table class="bg-white w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
             <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                 <tr>
                     <th scope="col" class="px-6 py-3">
                         Id
                     </th>
                     <th scope="col" class="px-6 py-3">
                         Name
                     </th>
                     <th scope="col" class="px-6 py-3">
                         Email
                     </th>
                     <th scope="col" class="px-6 py-3">
                         Phone Number
                     </th>
                     <th scope="col" class="px-6 py-3">
                         Action
                     </th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($users as $user)
                     <tr class="text-black">
                         <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                             {{ $user->id }}</th>
                         <td class="px-6 py-4">{{ $user->name }}</td>
                         <td class="px-6 py-4">{{ $user->email }}</td>
                         <td class="px-6 py-4">{{ $user->phone_number }}</td>

                     </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
 </x-app-layout>
