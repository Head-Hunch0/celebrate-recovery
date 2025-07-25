<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_green.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CR - Tickets - Registered </title>
    <!-- Favicon (logo on browser tab) -->
    <link rel="icon" href="{{ asset('images/CRLogo.png') }}" type="image/png">
</head>
<body>

    @include('partials.sidebar')

<div class="p-4 sm:ml-64">
    <div class="px-6 pt-10">

        @if(session('success'))
        <div class="p-4 mb-4 text-sm text-gray-800 rounded-lg bg-green-400 dark:bg-gray-800 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif

<div class="relative border border-gray-500 py-8 overflow-x-auto overflow-y-auto shadow-xl rounded-lg">
    <div class="p-8 bg-white dark:bg-gray-900 flex justify-between items-center">
        <label for="table-search" class="sr-only">Search</label>
        <form method="POST" action="{{ route('search') }}" class="relative mt-1 ">
            @csrf
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" name="search" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search tickets by name, email, or number">
        </form>

        <a href="{{ route('tickets.download.registered') }}" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Download CSV
        </a>


    </div>
    @if($tickets->count() > 0)
    <table id="registrationsTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Registration No. (UUID)
                </th>
                <th scope="col" class="px-6 py-3">
                    Full Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Gender
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Country
                </th>
                <th scope="col" class="px-6 py-3">
                    County
                </th>
                <th scope="col" class="px-6 py-3">
                    On WhatsApp
                </th>
                <th scope="col" class="px-6 py-3">
                    WhatsApp Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Age
                </th>
                <th scope="col" class="px-6 py-3">
                    Church
                </th>
                <th scope="col" class="px-6 py-3">
                    In CR Group
                </th>
                <th scope="col" class="px-6 py-3">
                    CR Group Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Interested in Starting CR Group
                </th>
                <th scope="col" class="px-6 py-3">
                    Willing to Sponsor
                </th>
                <th scope="col" class="px-6 py-3">
                    Registered On
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody id="tableContainer">
            @foreach ($tickets as $ticket)    
            
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">

                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    {{$ticket['uuid']}}
                </td>
                <td class="px-6 py-4">
                    {{$ticket['full_name']}}
                </td>
                <td class="px-6 py-4">
                    {{$ticket['email']}}
                </td>
                <td class="px-6 py-4">
                    {{$ticket['gender']}}
                </td>
                <td class="px-6 py-4">
                    {{$ticket['phone_number']}}
                </td>
                <td class="px-6 py-4">
                    {{$ticket['country']}}
                </td>
                <td class="px-6 py-4">
                    {{$ticket['county']}}
                </td>
                <td class="px-6 py-4">
                    {{$ticket['on_whatsapp'] }}
                </td>
                <td class="px-6 py-4">
                    {{$ticket['age'] }}
                </td>
                <td class="px-6 py-4">
                    {{$ticket['church'] }}
                </td>
                <td class="px-6 py-4">
                    {{$ticket['in_cr_group'] }}
                </td>
                <td class="px-6 py-4">
                    {{$ticket['cr_group_name'] }}
                </td>
                <td class="px-6 py-4">
                    {{$ticket['diet'] }}
                </td>
                <td class="px-6 py-4">
                    {{$ticket['interested_in_starting_cr_group'] }}
                </td>
                <td class="px-6 py-4">
                    {{$ticket['willing_to_sponsor'] }}
                </td>
                <td class="px-6 py-4">
                    {{ \Carbon\Carbon::parse($ticket['created_at'])->format('Y-m-d') }}
                </td>

                <td class="px-6 py-4">
                    <a href="#" 
                       data-modal-target="ticket-modal" 
                       data-modal-toggle="ticket-modal" 
                       onclick="setModalData('{{ $ticket->id }}', '{{ $ticket->full_name }}', '{{ $ticket->payment_method ?? '' }}', '{{ $ticket->payment_status ?? 'pending' }}')" 
                       class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        More
                    </a>
                </td>
            </tr>


            @endforeach
        </tbody>
    </table>
    @else
    <div class="flex items-center justify-content-center">
        <p class="mx-auto">No User found for "{{$searchTerm}}"</p>
    </div>
    @endif
</div>


<div id="ticket-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Payment Status
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="ticket-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="updateForm" method="POST" action="/admin/register-pay" class="p-4 md:p-5">
                @csrf
                <input type="hidden" id="ticketId" name="ticket_id">
                
                <div class="grid gap-4 mb-4">
                    <div class="col-span-2">
                        <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                    </div>
                    <div class="col-span-2">
                        <label for="payment_method" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment Method</label>
                        <select name="payment_method" id="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Select payment method</option>
                            <option value="mpesa">Mpesa</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="payment_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment Status</label>
                        <select name="payment_status" id="payment_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                            <option value="refunded">Refunded</option>
                            <option value="failed">Failed</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Update Ticket
                </button>
            </form>

            {{-- <form method="POST" action="" id="deleteForm" class="p-4 md:p-5">
                        @csrf
                            <input type="hidden" id="ticketId" name="ticket_id">

                        @method('DELETE')
                        <button type="submit" 
                                class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                onclick="return confirm('Are you sure you want to delete this ticket?')">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            Delete Ticket
                        </button>
            </form> --}}
        </div>
    </div>
</div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{asset('/js/index.js')}}"></script>
</body>
</html>