<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_green.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration </title>
</head>
<body>
    <style>
        /* Hide the default scrollbar */
::-webkit-scrollbar {
    width: 0;
    height: 0;
}

/* Define the style of the custom scrollbar */
::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: #888;
}

::-webkit-scrollbar-thumb:hover {
    background: #555;
}

 /* Define slide-in animation */
    @keyframes slideIn {
        from {
            transform: translateX(100%);
        }
        to {
            transform: translateX(0);
        }
    }

    /* Define slide-out animation */
    @keyframes slideOut {
        from {
            transform: translateX(0);
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }

    /* Apply animation to the alert element */
    .slide-in {
        animation: slideIn 0.5s ease forwards;
    }

    .slide-out {
        animation: slideOut 0.5s ease forwards;
    }

    .bg-image{
            background-image:  linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.1)), url("{{ asset('images/worship4.jpg') }}");
            background-size: cover;
            /* padding-top: 10px; */
        }
    </style>

    <div class="p-4 bg-image">
        <div class="py-5 flex items-center justify-center" >

            @if (session()->has('message'))
            <div id="toast-top-right" class="fixed flex items-center max-w-xs p-4 space-x-4 text-gray-900 bg-blue-200 divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow-xl top-5 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
                <div class="text-sm font-normal">{{session('message')}}</div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-inherit text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-top-right" aria-label="Close">
                <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>                      
            @endif
            

            <div class="flex justify-center h-90 w-full items-center pt-5 " id="passportDeets">
                <div class="w-full max-w-4xl p-4 bg-white border border-gray-200 rounded-xl shadow-xl sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                    
                <form id="passdeetsform" enctype="multipart/form-data" action="{{ route('register.user') }}" method="POST">
                    @csrf
                    <h4 class="text-green-600 italic text-center mb-5 text-2xl font-bold">Register for the Conference</h4>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex">Full Name
                                
                            </label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" required >
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex">Email address
                                
                            </label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="johndoe@email.com" required >
                        </div>
                        <div>
                            
                            <label for="sex" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex">Gender
                                
                            </label>
                            <select id="sex" name="sex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option disabled selected>Choose Gender</option>
                                <option value="male" >Male</option>
                                <option value="female" >Female</option>
                            </select>
                
                        </div>  
                        
                        <div>
                            <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex">Country
                            </label>
                            <input type="text" name="country" id="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Jamaica" required>
                        </div>
                        <div>
                            <label for="county" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex">County
                            </label>
                            <input type="text" name="county" id="county" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Uasin Gishu" required>
                        </div>
                        <div>
                            <label for="wa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex">Are you on WhatsApp?
                                
                            </label>
                                <select id="wa"  name="wa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option disabled selected>Choose One</option>
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                </select>
                        </div>
                        
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex">Phone Number
                                
                            </label>
                            <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="WhatsApp Preferred, please include Country Code" required>
                        </div>

                        <div>
                            <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex">Age
                                
                            </label>
                                <select id="age"  name="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option disabled selected>Age</option>
                                    <option value="18-24" >18 - 24</option>
                                    <option value="25-34" >25 - 34</option>
                                    <option value="35-49" >35 - 49</option>
                                    <option value="50+" >50+</option>
                                </select>
                        </div>

                        <div>
                            <label for="church" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex">Church / Organization
                            </label>
                            <input type="text" name="church" id="church" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Parklands Baptist" required>
                        </div>

                        <div>
                            <label for="cr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex">Are you currently part of a Celebrate Recovery group?
                                
                            </label>
                                <select id="cr"  name="cr" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option disabled selected>Choose One</option>
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                </select>
                        </div>
                        
                        <div>
                            <label for="crgroup" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex">If so, what's the name of your Celebrate Recovery group?
                            </label>
                            <input type="text" name="crgroup" id="crgroup" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="PBC" >
                        </div>

                        <div>
                            <label for="diet" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex">Do you have any special dietary needs or accommodations that we should be aware of? 
                            </label>
                            <input type="text" name="diet" id="diet" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Do you have any special dietary needs or accommodations that we should be aware of? " >
                        </div>
                        

                        <div>
                            <label for="crstart" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex">Are you interested in starting a Celebrate Recovery group in your Church, Organization, School or University?
                                
                            </label>
                                <select id="crstart"  name="crstart" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option disabled selected>Choose One</option>
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                    <option value="Maybe" >Maybe</option>
                                    <option value="Not Applicable" >Not Applicable</option>
                                </select>
                        </div>

                        

                        <div>
                            <label for="sponsor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white flex">This conference costs ksh 1000, would you be willing to sponsor someone?
                                
                            </label>
                                <select id="sponsor"  name="sponsor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="no" disabled selected>Choose One</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4" >4</option>
                                    <option value="5" >5</option>
                                </select>
                        </div>
                
                        
                    </div>
                        
                        <div class="flex justify-end">
                            <button type="submit" name="action" value="submit" id="final-submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"> Next </button>
                        </div>
                
                </form>
                
                </div>
                </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>