<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_green.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CR - Communication - Schedule </title>
    <!-- Favicon (logo on browser tab) -->
    <link rel="icon" href="{{ asset('images/CRLogo.png') }}" type="image/png">
</head>
<body>

    @include('partials.sidebar')

<div class="p-4 sm:ml-64">
    <div class="px-6 pt-10">
        
        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-8">

                @if (session()->has('message'))
                 <div id="toast-top-right" class="fixed flex items-center max-w-xs p-4 space-x-4 text-gray-900 bg-green-300 divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow-xl top-5 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
                    <div class="text-sm font-normal">{{session('message')}}</div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-inherit text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-top-right" aria-label="Close">
                    <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                 </div>                      
                @endif

                <div class="flex mr-6 justify-center items-center">
                    <h1 class="mb-6 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-2xl dark:text-white">CR Conference Schedule</h1>
                </div>
                
                <div class="p-6 mb-6 border border-gray-500 shadow-lg rounded-lg">
                    <time class="text-lg font-semibold text-gray-900 dark:text-white">August 13th, 2025</time>
                    <ol class="mt-3 divide-y divide-gray-200 dark:divide-gray-700 p-4">
                        
                        @if ($Schedule)
                            
                        @foreach ($wed as $item)
                        <div id="toast-default" class="flex items-center w-full p-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
                            <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.147 15.085a7.159 7.159 0 0 1-6.189 3.307A6.713 6.713 0 0 1 3.1 15.444c-2.679-4.513.287-8.737.888-9.548A4.373 4.373 0 0 0 5 1.608c1.287.953 6.445 3.218 5.537 10.5 1.5-1.122 2.706-3.01 2.853-6.14 1.433 1.049 3.993 5.395 1.757 9.117Z"/>
                                </svg>
                                <span class="sr-only">Fire icon</span>
                            </div>
                            <div class="ms-3 text-sm font-normal">{{$item->theme}} <br> {{$item->time}}</div>
                            <a href="/admin/website/schedule/delete/{{$item->id}}" type="button" class="ms-auto hover:cursor -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 "  aria-label="Close">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </a>
                            
                        </div>
                        @endforeach
                            
                        @endif

                    </ol>

                    <!-- Modal toggle -->
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-orange-500 hover:bg-orange-200 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                        Add To Day
                    </button>
                    
                    <!-- Main modal -->
                    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white dark:bg-gray-700 shadow-xl rounded-lg border border-gray-600">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Add Schedule
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form class="p-4 md:p-5" action="{{ route('admin.website.schedule.add') }}" method="POST">
                                    @csrf
                                    <div class="grid gap-4 mb-4 ">
                                        <div class="col-span-2">
                                            <label for="topic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Topic</label>
                                            <input type="text" name="topic" id="topic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type topic name" required="">
                                        </div>
                                        <input type="text" hidden name="date" id="date" value="Wednesday">
                                        <div class="pt-5  dark:border-gray-800 flex sm:flex-row flex-col sm:space-x-5 rtl:space-x-reverse">
                                            <div inline-datepicker datepicker-buttons datepicker-autoselect-today class="mx-auto sm:mx-0"></div>
                                            <div class="sm:ms-7 sm:ps-5 sm:border-s border-gray-200 dark:border-gray-800 w-full sm:max-w-[15rem] mt-5 sm:mt-0">
                                               <h3 class="text-gray-900 dark:text-white text-base font-medium mb-3 text-center">Wednesday, August 13, 2025</h3>
                                               <button type="button" data-collapse-toggle="timetable" class="inline-flex items-center w-full py-2 px-5 me-2 justify-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                  <svg class="w-4 h-4 text-gray-800 dark:text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                     <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                                  </svg>
                                                  Pick a time
                                               </button>
                                               <label class="sr-only">
                                               Pick a time
                                               </label>
                                              <ul id="timetable" class="grid w-full grid-cols-2 gap-2 mt-5">
                                                <!-- Morning Times -->
                                                <li>
                                                    <input type="radio" id="6-am" value="06:00 AM" class="hidden peer" name="timetable">
                                                    <label for="6-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        6:00 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="6-30-am" value="06:30 AM" class="hidden peer" name="timetable">
                                                    <label for="6-30-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        6:30 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="7-am" value="07:00 AM" class="hidden peer" name="timetable">
                                                    <label for="7-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        7:00 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="7-30-am" value="07:30 AM" class="hidden peer" name="timetable">
                                                    <label for="7-30-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        7:30 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="8-am" value="08:00 AM" class="hidden peer" name="timetable">
                                                    <label for="8-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        8:00 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="8-30-am" value="08:30 AM" class="hidden peer" name="timetable">
                                                    <label for="8-30-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        8:30 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="9-am" value="09:00 AM" class="hidden peer" name="timetable">
                                                    <label for="9-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        9:00 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="9-30-am" value="09:30 AM" class="hidden peer" name="timetable">
                                                    <label for="9-30-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        9:30 AM
                                                    </label>
                                                </li>
                                                
                                                <!-- Your existing times (10:00 AM - 3:30 PM) -->
                                                <li>
                                                    <input type="radio" id="10-am" value="10:00 AM" class="hidden peer" name="timetable">
                                                    <label for="10-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        10:00 AM
                                                    </label>
                                                </li>
                                                <!-- ... keep all your existing time slots ... -->
                                                
                                                <!-- Afternoon/Evening Times -->
                                                <li>
                                                    <input type="radio" id="4-pm" value="04:00 PM" class="hidden peer" name="timetable">
                                                    <label for="4-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        4:00 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="4-30-pm" value="04:30 PM" class="hidden peer" name="timetable">
                                                    <label for="4-30-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        4:30 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="5-pm" value="05:00 PM" class="hidden peer" name="timetable">
                                                    <label for="5-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        5:00 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="5-30-pm" value="05:30 PM" class="hidden peer" name="timetable">
                                                    <label for="5-30-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        5:30 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="6-pm" value="06:00 PM" class="hidden peer" name="timetable">
                                                    <label for="6-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        6:00 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="6-30-pm" value="06:30 PM" class="hidden peer" name="timetable">
                                                    <label for="6-30-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        6:30 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="7-pm" value="07:00 PM" class="hidden peer" name="timetable">
                                                    <label for="7-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        7:00 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="7-30-pm" value="07:30 PM" class="hidden peer" name="timetable">
                                                    <label for="7-30-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        7:30 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="8-pm" value="08:00 PM" class="hidden peer" name="timetable">
                                                    <label for="8-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        8:00 PM
                                                    </label>
                                                </li>
                                              </ul>
                                              
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <button type="submit" class="text-white inline-flex items-center bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        Add 
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div> 
  
                </div>


                <div class="p-6 mb-6 border border-gray-500 shadow-lg rounded-lg">
                    <time class="text-lg font-semibold text-gray-900 dark:text-white">August 14th, 2025</time>
                    <ol class="mt-3 divide-y divide-gray-200 dark:divide-gray-700 p-4">
                        

                        @if ($Schedule)
                            
                        @foreach ($thur as $item)
                        <div id="toast-default" class="flex items-center w-full p-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
                            <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.147 15.085a7.159 7.159 0 0 1-6.189 3.307A6.713 6.713 0 0 1 3.1 15.444c-2.679-4.513.287-8.737.888-9.548A4.373 4.373 0 0 0 5 1.608c1.287.953 6.445 3.218 5.537 10.5 1.5-1.122 2.706-3.01 2.853-6.14 1.433 1.049 3.993 5.395 1.757 9.117Z"/>
                                </svg>
                                <span class="sr-only">Fire icon</span>
                            </div>
                            <div class="ms-3 text-sm font-normal">{{$item->theme}} <br> {{$item->time}}</div>
                            <a href="/admin/website/schedule/delete/{{$item->id}}" type="button" class="ms-auto hover:cursor -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 "  aria-label="Close">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </a>
                            
                        </div>
                        @endforeach
                            
                        @endif

                    </ol>

                    <!-- Modal toggle -->
                    <button data-modal-target="crud-modal1" data-modal-toggle="crud-modal1" class="block text-white bg-orange-500 hover:bg-orange-200 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                        Add To Day
                    </button>
                    
                    <!-- Main modal -->
                    <div id="crud-modal1" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white dark:bg-gray-700 shadow-xl rounded-lg border border-gray-600">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Add Schedule
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal1">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form class="p-4 md:p-5" action="{{ route('admin.website.schedule.add') }}" method="POST">
                                    @csrf
                                    <div class="grid gap-4 mb-4 ">
                                        <div class="col-span-2">
                                            <label for="topic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Topic</label>
                                            <input type="text" name="topic" id="topic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type topic name" required="">
                                        </div>
                                        <input type="text" hidden name="date" id="date" value="Thursday">
                                        <div class="pt-5  dark:border-gray-800 flex sm:flex-row flex-col sm:space-x-5 rtl:space-x-reverse">
                                            <div inline-datepicker datepicker-buttons datepicker-autoselect-today class="mx-auto sm:mx-0"></div>
                                            <div class="sm:ms-7 sm:ps-5 sm:border-s border-gray-200 dark:border-gray-800 w-full sm:max-w-[15rem] mt-5 sm:mt-0">
                                               <h3 class="text-gray-900 dark:text-white text-base font-medium mb-3 text-center">Wednesday, August 14, 2025</h3>
                                               <button type="button" data-collapse-toggle="timetable" class="inline-flex items-center w-full py-2 px-5 me-2 justify-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                  <svg class="w-4 h-4 text-gray-800 dark:text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                     <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                                  </svg>
                                                  Pick a time
                                               </button>
                                               <label class="sr-only">
                                               Pick a time
                                               </label>
                                               <ul id="timetable" class="grid w-full grid-cols-2 gap-2 mt-5">
                                                <!-- Morning Times -->
                                                <li>
                                                    <input type="radio" id="6-am" value="06:00 AM" class="hidden peer" name="timetable">
                                                    <label for="6-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        6:00 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="6-30-am" value="06:30 AM" class="hidden peer" name="timetable">
                                                    <label for="6-30-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        6:30 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="7-am" value="07:00 AM" class="hidden peer" name="timetable">
                                                    <label for="7-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        7:00 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="7-30-am" value="07:30 AM" class="hidden peer" name="timetable">
                                                    <label for="7-30-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        7:30 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="8-am" value="08:00 AM" class="hidden peer" name="timetable">
                                                    <label for="8-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        8:00 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="8-30-am" value="08:30 AM" class="hidden peer" name="timetable">
                                                    <label for="8-30-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        8:30 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="9-am" value="09:00 AM" class="hidden peer" name="timetable">
                                                    <label for="9-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        9:00 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="9-30-am" value="09:30 AM" class="hidden peer" name="timetable">
                                                    <label for="9-30-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        9:30 AM
                                                    </label>
                                                </li>
                                                
                                                <!-- Your existing times (10:00 AM - 3:30 PM) -->
                                                <li>
                                                    <input type="radio" id="10-am" value="10:00 AM" class="hidden peer" name="timetable">
                                                    <label for="10-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        10:00 AM
                                                    </label>
                                                </li>
                                                <!-- ... keep all your existing time slots ... -->
                                                
                                                <!-- Afternoon/Evening Times -->
                                                <li>
                                                    <input type="radio" id="4-pm" value="04:00 PM" class="hidden peer" name="timetable">
                                                    <label for="4-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        4:00 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="4-30-pm" value="04:30 PM" class="hidden peer" name="timetable">
                                                    <label for="4-30-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        4:30 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="5-pm" value="05:00 PM" class="hidden peer" name="timetable">
                                                    <label for="5-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        5:00 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="5-30-pm" value="05:30 PM" class="hidden peer" name="timetable">
                                                    <label for="5-30-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        5:30 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="6-pm" value="06:00 PM" class="hidden peer" name="timetable">
                                                    <label for="6-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        6:00 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="6-30-pm" value="06:30 PM" class="hidden peer" name="timetable">
                                                    <label for="6-30-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        6:30 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="7-pm" value="07:00 PM" class="hidden peer" name="timetable">
                                                    <label for="7-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        7:00 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="7-30-pm" value="07:30 PM" class="hidden peer" name="timetable">
                                                    <label for="7-30-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        7:30 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="8-pm" value="08:00 PM" class="hidden peer" name="timetable">
                                                    <label for="8-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        8:00 PM
                                                    </label>
                                                </li>
                                            </ul>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <button type="submit" class="text-white inline-flex items-center bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        Add 
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div> 
  
                </div>


                <div class="p-6 mb-6 border border-gray-500 shadow-lg rounded-lg">
                    <time class="text-lg font-semibold text-gray-900 dark:text-white">August 15th, 2025</time>
                    <ol class="mt-3 divide-y divide-gray-200 dark:divide-gray-700 p-4">
                        
                        @if ($Schedule)
                            
                        @foreach ($fri as $item)
                        <div id="toast-default" class="flex items-center w-full p-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
                            <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.147 15.085a7.159 7.159 0 0 1-6.189 3.307A6.713 6.713 0 0 1 3.1 15.444c-2.679-4.513.287-8.737.888-9.548A4.373 4.373 0 0 0 5 1.608c1.287.953 6.445 3.218 5.537 10.5 1.5-1.122 2.706-3.01 2.853-6.14 1.433 1.049 3.993 5.395 1.757 9.117Z"/>
                                </svg>
                                <span class="sr-only">Fire icon</span>
                            </div>
                            <div class="ms-3 text-sm font-normal">{{$item->theme}} <br> {{$item->time}}</div>
                            <a href="/admin/website/schedule/delete/{{$item->id}}" type="button" class="ms-auto hover:cursor -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 "  aria-label="Close">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </a>
                            
                        </div>
                        @endforeach
                            
                        @endif

                    </ol>

                    <!-- Modal toggle -->
                    <button data-modal-target="crud-modal3" data-modal-toggle="crud-modal3" class="block text-white bg-orange-500 hover:bg-orange-200 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                        Add To Day
                    </button>
                    
                    <!-- Main modal -->
                    <div id="crud-modal3" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white dark:bg-gray-700 shadow-xl rounded-lg border border-gray-600">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Add Schedule
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal3">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form class="p-4 md:p-5" action="{{ route('admin.website.schedule.add') }}" method="POST">
                                    @csrf
                                    <div class="grid gap-4 mb-4 ">
                                        <div class="col-span-2">
                                            <label for="topic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Topic</label>
                                            <input type="text" name="topic" id="topic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type topic name" required="">
                                        </div>
                                        <input type="text" hidden name="date" id="date" value="Friday">
                                        <div class="pt-5  dark:border-gray-800 flex sm:flex-row flex-col sm:space-x-5 rtl:space-x-reverse">
                                            <div inline-datepicker datepicker-buttons datepicker-autoselect-today class="mx-auto sm:mx-0"></div>
                                            <div class="sm:ms-7 sm:ps-5 sm:border-s border-gray-200 dark:border-gray-800 w-full sm:max-w-[15rem] mt-5 sm:mt-0">
                                               <h3 class="text-gray-900 dark:text-white text-base font-medium mb-3 text-center">Wednesday, August 15, 2025</h3>
                                               <button type="button" data-collapse-toggle="timetable" class="inline-flex items-center w-full py-2 px-5 me-2 justify-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                  <svg class="w-4 h-4 text-gray-800 dark:text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                     <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                                  </svg>
                                                  Pick a time
                                               </button>
                                               <label class="sr-only">
                                               Pick a time
                                               </label>
                                               <ul id="timetable" class="grid w-full grid-cols-2 gap-2 mt-5">
                                                <!-- Morning Times -->
                                                <li>
                                                    <input type="radio" id="6-am" value="06:00 AM" class="hidden peer" name="timetable">
                                                    <label for="6-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        6:00 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="6-30-am" value="06:30 AM" class="hidden peer" name="timetable">
                                                    <label for="6-30-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        6:30 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="7-am" value="07:00 AM" class="hidden peer" name="timetable">
                                                    <label for="7-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        7:00 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="7-30-am" value="07:30 AM" class="hidden peer" name="timetable">
                                                    <label for="7-30-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        7:30 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="8-am" value="08:00 AM" class="hidden peer" name="timetable">
                                                    <label for="8-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        8:00 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="8-30-am" value="08:30 AM" class="hidden peer" name="timetable">
                                                    <label for="8-30-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        8:30 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="9-am" value="09:00 AM" class="hidden peer" name="timetable">
                                                    <label for="9-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        9:00 AM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="9-30-am" value="09:30 AM" class="hidden peer" name="timetable">
                                                    <label for="9-30-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        9:30 AM
                                                    </label>
                                                </li>
                                                
                                                <!-- Your existing times (10:00 AM - 3:30 PM) -->
                                                <li>
                                                    <input type="radio" id="10-am" value="10:00 AM" class="hidden peer" name="timetable">
                                                    <label for="10-am" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        10:00 AM
                                                    </label>
                                                </li>
                                                <!-- ... keep all your existing time slots ... -->
                                                
                                                <!-- Afternoon/Evening Times -->
                                                <li>
                                                    <input type="radio" id="4-pm" value="04:00 PM" class="hidden peer" name="timetable">
                                                    <label for="4-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        4:00 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="4-30-pm" value="04:30 PM" class="hidden peer" name="timetable">
                                                    <label for="4-30-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        4:30 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="5-pm" value="05:00 PM" class="hidden peer" name="timetable">
                                                    <label for="5-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        5:00 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="5-30-pm" value="05:30 PM" class="hidden peer" name="timetable">
                                                    <label for="5-30-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        5:30 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="6-pm" value="06:00 PM" class="hidden peer" name="timetable">
                                                    <label for="6-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        6:00 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="6-30-pm" value="06:30 PM" class="hidden peer" name="timetable">
                                                    <label for="6-30-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        6:30 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="7-pm" value="07:00 PM" class="hidden peer" name="timetable">
                                                    <label for="7-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        7:00 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="7-30-pm" value="07:30 PM" class="hidden peer" name="timetable">
                                                    <label for="7-30-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        7:30 PM
                                                    </label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="8-pm" value="08:00 PM" class="hidden peer" name="timetable">
                                                    <label for="8-pm" class="inline-flex items-center justify-center w-full p-2 text-sm font-medium text-center bg-white border rounded-lg cursor-pointer text-orange-600 border-orange-600 hover:bg-orange-500 peer-checked:text-white peer-checked:bg-orange-600 peer-checked:border-orange-600">
                                                        8:00 PM
                                                    </label>
                                                </li>
                                            </ul>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <button type="submit" class="text-white inline-flex items-center bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        Add 
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div> 
  
                </div>
                

            </div>

        </section>
        

    
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{asset('/js/index.js')}}"></script>
</body>
</html>