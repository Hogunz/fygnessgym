 <x-app-layout>

     {{-- <div class="relative overflow-x-auto container mx-auto pt-24">

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
     </div> --}}
     <section class=" py-8 antialiased dark:bg-gray-900 md:py-16">
         <div class="mx-auto max-w-screen-lg px-4 2xl:px-0">
             <div class="lg:flex lg:items-center lg:justify-between lg:gap-4">
                 <h2 class="shrink-0 text-xl font-semibold text-yellow-300 sm:text-2xl">Announcements</h2>


             </div>

             <div class="mt-6 flow-root">
                 <div class="-my-6 divide-y divide-gray-200 dark:divide-gray-800">
                     @foreach ($announcements as $announcement)
                         <div class="space-y-4  py-6 md:py-8">
                             <div class="grid gap-4 text-xl font-semibold text-white">

                                 {{ $announcement->gym->name }}
                             </div>
                             <div class=" ">
                                 <p class="text-base font-normal text-white/75 ">
                                     {{ $announcement->title }}
                                 </p>
                             </div>

                             <p class="text-base font-normal text-white/75  ">
                                 {{ $announcement->description }}
                             </p>
                             <p class="text-sm font-medium text-blue-300  ">
                                 {{ $announcement->created_at->format('F d, Y h:i a') }}
                             </p>
                         </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </section>

 </x-app-layout>
