 <x-app-layout>

     <div class="relative overflow-x-auto container mx-auto pt-24">

         <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

             <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                 <tr>
                     <th scope="col" class="px-6 py-3">
                         Gym
                     </th>
                     <th scope="col" class="px-6 py-3">
                         Title
                     </th>
                     <th scope="col" class="px-6 py-3">
                         Description
                     </th>

                     <th scope="col" class="px-6 py-3">
                         Created at
                     </th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($announcements as $announcement)
                     <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                         <th scope="row"
                             class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                             {{ $announcement->gym->name }}
                         </th>
                         <td class="px-6 py-4">
                             {{ $announcement->title }}
                         </td>
                         <td class="px-6 py-4">
                             {{ $announcement->description }}
                         </td>
                         <td class="px-6 py-4">
                             {{ $announcement->created_at->format('F d, Y h:i a') }}
                         </td>

                     </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
 </x-app-layout>
