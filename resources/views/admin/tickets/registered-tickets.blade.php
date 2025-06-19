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
</head>
<body>

    @include('partials.sidebar')

<div class="p-4 sm:ml-64">
    <div class="px-6 pt-10">

        

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

        <button onclick="downloadTableAsCSV('registrationsTable')" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Download CSV
        </button>
    </div>
    @if($tickets->count() > 0)
    <table id="registrationsTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Registration No.
                </th>
                <th scope="col" class="px-6 py-3">
                    Names
                </th>
                <th scope="col" class="px-6 py-3">
                    Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Time
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
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
                    {{$ticket['phone_number']}}
                </td>

                <td class="px-6 py-4">
                    {{-- {{$ticket['created_at']}} --}}
                    {{ \Carbon\Carbon::parse($ticket['created_at'])->format('Y-m-d H:i:s') }}
                </td>

                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">More</a>
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

    
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{asset('/js/index.js')}}"></script>
</body>
</html>