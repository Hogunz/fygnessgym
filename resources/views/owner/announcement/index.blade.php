 <x-app-layout>

     <div class="relative overflow-x-auto container mx-auto pt-24">

         <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
             <a href="/announcement/create" class="href">
                 <button type="button"
                     class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                     Create Announcement</button>
             </a>
             <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                 <tr>
                     <th scope="col" class="px-6 py-3">
                         ID
                     </th>
                     <th scope="col" class="px-6 py-3">
                         Name
                     </th>
                     <th scope="col" class="px-6 py-3">
                         Email
                     </th>
                     <th scope="col" class="px-6 py-3">
                         Contact Number
                     </th>
                     <th scope="col" class="px-6 py-3">
                         Subscribed Gym
                     </th>
                     <th scope="col" class="px-6 py-3">
                         Subscriptions </th>
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
                 @for ($i = 0; $i > 4; $i++)
                     <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                         <th scope="row"
                             class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                         </th>
                         <td class="px-6 py-4">

                         </td>
                         <td class="px-6 py-4">

                         </td>
                         <td class="px-6 py-4">

                         </td>
                         <td class="px-6 py-4">

                         </td>
                         <td class="px-6 py-4">

                         </td>
                         <td class="px-6 py-4">

                         </td>
                         <td class="px-6 py-4">

                         </td>
                         <td class="px-6 py-4">
                             <a href="#"
                                 class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                         </td>
                     </tr>
                 @endfor
             </tbody>
         </table>
     </div>
 </x-app-layout>
