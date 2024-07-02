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
                         Action
                     </th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($announcements as $announcement)
                     <tr class="text-black">
                         <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                             {{ $announcement->gym->name }}</th>
                         <td class="px-6 py-4">{{ $announcement->title }}</td>
                         <td class="px-6 py-4">{{ $announcement->description }}</td>
                         <td class="px-6 py-4">
                             <a href="{{ route('admin.editAnnouncement', $announcement) }}"
                                 class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                         </td>
                         <td class="flex items-center px-6 py-4">
                             <form action="{{ route('admin.deleteAnnouncement', $announcement) }}" method="post">
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
