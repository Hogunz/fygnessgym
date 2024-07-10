 <style>
     @media print {
         body * {
             visibility: hidden;
         }

         #print-table,
         #print-table * {
             visibility: visible;
         }

         #print-table {
             width: 100%;
         }

         /* Custom Tailwind print styles */
         #print-table {
             border-collapse: collapse;
         }

         #print-table th,
         #print-table td {
             border: 1px solid #e2e8f0;
             /* Replace with Tailwind colors or utilities */
             padding: 8px;
         }

         #print-table th {
             background-color: #edf2f7;
             /* Replace with Tailwind colors */
             color: #2d3748;
             /* Replace with Tailwind colors */
             font-size: 10px;
             /* Adjust as needed */
             text-align: left;
             /* Adjust as needed */
         }

         #print-table td {
             font-size: 10px;
             /* Adjust as needed */
             text-align: left;
             /* Adjust as needed */
         }

         /* Hide specific columns for print */
         #print-table .print-hide-action,
         #print-table .print-hide-status {
             display: none;
         }
     }
 </style>
 <x-app-layout>
     <div class="relative overflow-x-auto container mx-auto pt-24">
         <button type="button"
             class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
             onclick="printTable()">Print Table</button>

         <table id="print-table"
             class="bg-white w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 table-auto  border-collapse">
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
                     <th scope="col" class="px-6 py-3 print:hidden">
                         Status
                     </th>
                     <th scope="col" class="px-6 py-3 print:hidden">
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
                         <td class="px-6 py-4 print:hidden">{{ $customer->plan }} Month/s</td>
                         <td class="px-6 py-4 print:hidden">{{ $customer->status }}</td>
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

 <script>
     function printTable() {
         var printContents = document.getElementById('print-table').outerHTML;
         var originalContents = document.body.innerHTML;
         document.body.innerHTML = printContents;
         window.print();
         document.body.innerHTML = originalContents;
     }
 </script>
