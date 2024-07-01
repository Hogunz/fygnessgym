 <x-app-layout>


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
                     @if ($announcements->isEmpty())
                         <p class="text-gray-700 dark:text-gray-300">No tasks found.</p>
                     @endif
                 </div>
             </div>
         </div>
     </section>

 </x-app-layout>
