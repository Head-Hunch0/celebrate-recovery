<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_green.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CR - Communication - Speakers </title>
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
                    <h1 class="mb-6 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-2xl dark:text-white">CR Conference Speakers</h1>
                </div>
                

                <div class="max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-xl border border-gray-300 p-6 my-10">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Speaker Settings</h2>
                    
                    <form action="/admin/website/speakers/toggle" method="POST" class="space-y-6">
                        @csrf <!-- Remove if not using Laravel -->
                        
                        <!-- Toggle Switch (Flowbite version) -->
                        <div class="flex items-center justify-between">
                            <div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="show_speakers" class="sr-only peer"
                                    {{ $toggle->show ? 'checked' : '' }}
                                    >
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        {{ $toggle->show ? 'Hide Speakers' : 'Show Speakers' }}
                                    </span>
                                </label>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Toggle to show/hide speakers on the public schedule</p>
                            </div>
                        </div>
                                    
            
                        <!-- Submit Button (Flowbite styled) -->
                        <button type="submit" class="w-1/2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Save Settings
                        </button>
                    </form>
                </div>
  
                <div class="p-6 mb-6 border border-gray-500 shadow-lg rounded-lg">
                    <time class="text-lg font-semibold text-gray-900 dark:text-white">August 13th, 2025</time>
                    <ol class="mt-3 divide-y divide-gray-200 dark:divide-gray-700 p-4">
                        
                        @if ($Speaker)
                            
                        @foreach ($wed as $item)
                        
                        <div id="toast-message-cta" class="w-full mb-5 p-4 text-gray-500 bg-white rounded-lg shadow-lg dark:bg-gray-800 dark:text-gray-400" role="alert">
                            <div class="flex p-5">
                                <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                            
                                <div class="ms-5 text-sm font-normal">
                                    <span class="mb-2 pb-5 text-sm font-semibold text-gray-900 dark:text-white">{{$item->speaker}}</span>
                                    <div class="mb-2 text-sm font-normal">Intro : {{$item->intro}}</div> 
                                    <div class="mb-2 text-sm font-normal">Theme : {{$item->theme}}</div> 
                                    <div class="mb-2 text-sm font-normal">Topic : {{$item->topic}}</div> 
                                    {{-- <p class="inline-flex px-2.5 py-1.5 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">{{$item->topic}}</a>    --}}
                                </div>
                                <a href="/admin/website/speaker/delete/{{$item->id}}" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-message-cta" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @endforeach
                            
                        @endif


                    </ol>

                    <!-- Modal toggle -->
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-orange-500 hover:bg-orange-200 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                        Add Speaker
                    </button>
                    
                    <!-- Main modal -->
                    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white dark:bg-gray-700 shadow-xl rounded-lg border border-gray-600">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Add Speaker
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form class="p-4 md:p-5" action="{{ route('admin.website.speaker.add') }}" method="POST">
                                    @csrf
                                    <div class="grid gap-4 mb-4">
                                        <!-- Existing Fields -->
                                        <div class="col-span-2">
                                            <label for="theme" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Theme</label>
                                            <input type="text" name="theme" id="theme" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Event theme" required>
                                        </div>
                                
                                        <!-- New Fields -->
                                        <div class="col-span-2">
                                            <label for="speaker" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Speaker</label>
                                            <input type="text" name="speaker" id="speaker" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Speaker's name" required>
                                        </div>
                                
                                        <div class="col-span-2">
                                            <label for="topic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Topic</label>
                                            <input type="text" name="topic" id="topic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Session topic" required>
                                        </div>
                                
                                        <div class="col-span-2">
                                            <label for="intro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Introduction (Optional)</label>
                                            <textarea name="intro" id="intro" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Brief description"></textarea>
                                        </div>
                                
                                        <div class="col-span-2">
                                            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                                            <input type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Event venue" required>
                                        </div>
                                
                                        <!-- Hidden Day Field (Auto-set) -->
                                        <input type="hidden" name="day" value="Wednesday">
                                
                                        <!-- Time Picker (Existing) -->
                                        <div class="col-span-2">
                                            <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
                                            <input 
                                                type="text" 
                                                name="time" 
                                                id="time"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Select time"
                                                required
                                            >
                                        </div>
                                        
                                    </div>
                                
                                    <button type="submit" class="text-white inline-flex items-center bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        Add Speaker
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div> 
  
                </div>


                <div class="p-6 mb-6 border border-gray-500 shadow-lg rounded-lg">
                    <time class="text-lg font-semibold text-gray-900 dark:text-white">August 14th, 2025</time>
                    <ol class="mt-3 divide-y divide-gray-200 dark:divide-gray-700 p-4">
                        

                        @if ($Speaker)
                            
                        @foreach ($thur as $item)
                        <div id="toast-message-cta" class="w-full mb-5 p-4 text-gray-500 bg-white rounded-lg shadow-lg dark:bg-gray-800 dark:text-gray-400" role="alert">
                            <div class="flex p-5">
                                <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                            
                                <div class="ms-5 text-sm font-normal">
                                    <span class="mb-2 text-sm font-semibold text-gray-900 dark:text-white">{{$item->speaker}}</span>
                                    <div class="mb-2 text-sm font-normal">Intro : {{$item->intro}}</div> 
                                    <div class="mb-2 text-sm font-normal">Theme : {{$item->theme}}</div> 
                                    <p class="inline-flex px-2.5 py-1.5 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">{{$item->topic}}</a>   
                                </div>
                                <a href="/admin/website/speaker/delete/{{$item->id}}" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-message-cta" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @endforeach
                            
                        @endif

                    </ol>

                    <!-- Modal toggle -->
                    <button data-modal-target="crud-modal1" data-modal-toggle="crud-modal1" class="block text-white bg-orange-500 hover:bg-orange-200 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                        Add Speaker
                    </button>
                    
                    <!-- Main modal -->
                    <div id="crud-modal1" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white dark:bg-gray-700 shadow-xl rounded-lg border border-gray-600">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Add Speaker
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal1">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form class="p-4 md:p-5" action="{{ route('admin.website.speaker.add') }}" method="POST">
                                    @csrf
                                    <div class="grid gap-4 mb-4">
                                        <!-- Existing Fields -->
                                        <div class="col-span-2">
                                            <label for="theme" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Theme</label>
                                            <input type="text" name="theme" id="theme" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Event theme" required>
                                        </div>
                                
                                        <!-- New Fields -->
                                        <div class="col-span-2">
                                            <label for="speaker" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Speaker</label>
                                            <input type="text" name="speaker" id="speaker" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Speaker's name" required>
                                        </div>
                                
                                        <div class="col-span-2">
                                            <label for="topic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Topic</label>
                                            <input type="text" name="topic" id="topic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Session topic" required>
                                        </div>
                                
                                        <div class="col-span-2">
                                            <label for="intro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Introduction (Optional)</label>
                                            <textarea name="intro" id="intro" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Brief description"></textarea>
                                        </div>
                                
                                        <div class="col-span-2">
                                            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                                            <input type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Event venue" required>
                                        </div>
                                
                                        <!-- Hidden Day Field (Auto-set) -->
                                        <input type="hidden" name="day" value="Thursday">
                                
                                        <!-- Time Picker (Existing) -->
                                        <div class="col-span-2">
                                            <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
                                            <input 
                                                type="text" 
                                                name="time" 
                                                id="time"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Select time"
                                                required
                                            >
                                        </div>
                                        
                                    </div>
                                
                                    <button type="submit" class="text-white inline-flex items-center bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        Add Speaker
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div> 
  
                </div>


                <div class="p-6 mb-6 border border-gray-500 shadow-lg rounded-lg">
                    <time class="text-lg font-semibold text-gray-900 dark:text-white">August 15th, 2025</time>
                    <ol class="mt-3 divide-y divide-gray-200 dark:divide-gray-700 p-4">
                        
                        @if ($Speaker)
                            
                        @foreach ($fri as $item)
                        <div id="toast-message-cta" class="w-full mb-5 p-4 text-gray-500 bg-white rounded-lg shadow-lg dark:bg-gray-800 dark:text-gray-400" role="alert">
                            <div class="flex p-5">
                                <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                            
                                <div class="ms-5 text-sm font-normal">
                                    <span class="mb-2 text-sm font-semibold text-gray-900 dark:text-white">{{$item->speaker}}</span>
                                    <div class="mb-2 text-sm font-normal">Intro : {{$item->intro}}</div> 
                                    <div class="mb-2 text-sm font-normal">Theme : {{$item->theme}}</div> 
                                    <p class="inline-flex px-2.5 py-1.5 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">{{$item->topic}}</a>   
                                </div>
                                <a href="/admin/website/speaker/delete/{{$item->id}}" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-message-cta" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @endforeach
                            
                        @endif

                    </ol>

                    <!-- Modal toggle -->
                    <button data-modal-target="crud-modal3" data-modal-toggle="crud-modal3" class="block text-white bg-orange-500 hover:bg-orange-200 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                        Add Speaker
                    </button>
                    
                    <!-- Main modal -->
                    <div id="crud-modal3" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white dark:bg-gray-700 shadow-xl rounded-lg border border-gray-600">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Add Speaker
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal3">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form class="p-4 md:p-5" action="{{ route('admin.website.speaker.add') }}" method="POST">
                                    @csrf
                                    <div class="grid gap-4 mb-4">
                                        <!-- Existing Fields -->
                                        <div class="col-span-2">
                                            <label for="theme" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Theme</label>
                                            <input type="text" name="theme" id="theme" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Event theme" required>
                                        </div>
                                
                                        <!-- New Fields -->
                                        <div class="col-span-2">
                                            <label for="speaker" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Speaker</label>
                                            <input type="text" name="speaker" id="speaker" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Speaker's name" required>
                                        </div>
                                
                                        <div class="col-span-2">
                                            <label for="topic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Topic</label>
                                            <input type="text" name="topic" id="topic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Session topic" required>
                                        </div>
                                
                                        <div class="col-span-2">
                                            <label for="intro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Introduction (Optional)</label>
                                            <textarea name="intro" id="intro" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Brief description"></textarea>
                                        </div>
                                
                                        <div class="col-span-2">
                                            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                                            <input type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Event venue" required>
                                        </div>
                                
                                        <!-- Hidden Day Field (Auto-set) -->
                                        <input type="hidden" name="day" value="Friday">
                                
                                        <!-- Time Picker (Existing) -->
                                        <div class="col-span-2">
                                            <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
                                            <input 
                                                type="text" 
                                                name="time" 
                                                id="time"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Select time"
                                                required
                                            >
                                        </div>
                                        
                                    </div>
                                
                                    <button type="submit" class="text-white inline-flex items-center bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        Add Speaker
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

<script>
    flatpickr("#time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "h:i K",  // e.g., "02:30 PM"
        time_24hr: false,      // Show AM/PM
    });
</script>
</body>
</html>