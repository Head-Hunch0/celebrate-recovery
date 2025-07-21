<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for Celebrate Recovery</title>
    <!-- Favicon (logo on browser tab) -->
    <link rel="icon" href="{{ asset('images/CRLogo.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        .form-section {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(5px);
        }
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.3);
        }
        .bg-image{
            background-image:  linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.1)), url("{{ asset('images/worship4.jpg') }}");
            background-size: cover;
            /* padding-top: 10px; */
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-orange-600 text-white">
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <img src="{{asset('images/WhiteCRLogo.png')}}" alt="Celebrate Recovery" class="h-20">
                    <span class="ml-2 mb-3 text-xl font-bold hidden md:block">Healing Begins Here</span>
                </div>
                <div>
                    <a href="/" class="bg-white text-orange-600 px-6 py-2 rounded-lg font-bold hover:bg-orange-50 transition">Back to Event</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Progress Steps -->

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Registration Form -->
                <div class="md:w-2/3">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="p-8 form-section">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">Registration Form</h1>
                            <p class="text-gray-600 mb-8">Please fill out all required fields to complete your registration for the Celebrate Recovery event <br>
                            Space is limited and registrations will close once capacity is reached.</p>

                            <form id="registrationForm" enctype="multipart/form-data" action="{{ secure_url(route('register.user')) }}" method="POST">
                                @csrf

                                <h4 class="text-orange-600 italic text-center mb-8 text-2xl font-bold">Register for the Conference</h4>
                                
                                <!-- Personal Information -->
                                <div class="mb-10">
                                    <h2 class="text-xl font-semibold text-gray-900 border-b pb-2 mb-6 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                        Personal Information
                                    </h2>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                                            <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-orange-500" placeholder="John Doe">
                                        </div>
                                        <div>
                                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                                            <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-orange-500" placeholder="johndoe@email.com">
                                        </div>
                                        <div>
                                            <label for="sex" class="block text-sm font-medium text-gray-700 mb-1">Gender *</label>
                                            <select id="sex" name="sex" required class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-orange-500">
                                                <option value="" disabled selected>Choose Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Country *</label>
                                            <input type="text" id="country" name="country" required class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-orange-500" placeholder="Kenya">
                                        </div>
                                        <div>
                                            <label for="county" class="block text-sm font-medium text-gray-700 mb-1">County *</label>
                                            <input type="text" id="county" name="county" required class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-orange-500" placeholder="Nairobi">
                                        </div>
                                        <div>
                                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number *</label>
                                            <input type="text" id="phone" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-orange-500" placeholder="WhatsApp Preferred, please include Country Code">
                                        </div>
                                        <div>
                                            <label for="age" class="block text-sm font-medium text-gray-700 mb-1">Age *</label>
                                            <select id="age" name="age" required class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-orange-500">
                                                <option value="" disabled selected>Age</option>
                                                <option value="18-24">18 - 24</option>
                                                <option value="25-34">25 - 34</option>
                                                <option value="35-49">35 - 49</option>
                                                <option value="50+">50+</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="wa" class="block text-sm font-medium text-gray-700 mb-1">Are you on WhatsApp? *</label>
                                            <select id="wa" name="wa" required class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-orange-500">
                                                <option value="" disabled selected>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Church Information -->
                                <div class="mb-10">
                                    <h2 class="text-xl font-semibold text-gray-900 border-b pb-2 mb-6 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                        </svg>
                                        Church & Recovery Information
                                    </h2>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="church" class="block text-sm font-medium text-gray-700 mb-1">Church / Organization / University *</label>
                                            <input type="text" id="church" name="church" required class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-orange-500" placeholder="Ridgeways Baptist Church">
                                        </div>
                                        <div>
                                            <label for="cr" class="block text-sm font-medium text-gray-700 mb-1">Are you currently part of a Celebrate Recovery group? *</label>
                                            <select id="cr" name="cr" required class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-orange-500">
                                                <option value="" disabled selected>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div id="crgroup-section">
                                            <label for="crgroup" class="block text-sm font-medium text-gray-700 mb-1">If so, what's the name of your Celebrate Recovery group?</label>
                                            <input type="text" id="crgroup" name="crgroup" class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-orange-500" placeholder="RBC">
                                        </div>
                                        <div>
                                            <label for="crstart" class="block text-sm font-medium text-gray-700 mb-1">Are you interested in starting a Celebrate Recovery group?</label>
                                            <select id="crstart" name="crstart" class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-orange-500">
                                                <option value="" disabled selected>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Maybe">Maybe</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Additional Information -->
                                <div class="mb-10">
                                    <h2 class="text-xl font-semibold text-gray-900 border-b pb-2 mb-6 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                                        </svg>
                                        Additional Information
                                    </h2>
                                    
                                    <div class="space-y-6">
                                        <div>
                                            <label for="diet" class="block text-sm font-medium text-gray-700 mb-1">Special dietary needs or accommodations</label>
                                            <input type="text" id="diet" name="diet" class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-orange-500" placeholder="Any special dietary needs?">
                                        </div>
                                        
                                        <div>
                                            <label for="sponsor" class="block text-sm font-medium text-gray-700 mb-1">Would you be willing to sponsor someone? ( Conference costs KSH 1000 <span id="usd-equivalent" class="text-orange-500 font-semibold"> / USD 7.75</span>)</label>
                                            <select id="sponsor" name="sponsor" class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-orange-500">
                                                <option value="" disabled selected>Choose One</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        
                                        <div id="num-section" class="hidden">
                                            <label for="num" class="block text-sm font-medium text-gray-700 mb-1">How many people would you like to sponsor?</label>
                                            <input type="number" id="num" name="num" class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-orange-500" placeholder="Number of people to sponsor">
                                        </div>
                                        
                                        
                                    </div>
                                </div>

                                <div style="position:absolute;left:-9999px" aria-hidden="true">
                                    <label for="website_url">Website (optional)</label>
                                    <input type="url" 
                                        name="website" 
                                        id="website_url"
                                        tabindex="-1"
                                        autocomplete="off"
                                        placeholder="https://">
                                </div>

                                <input type="hidden" name="form_load_time" value="{{ now()->timestamp }}">                            

                                <div class="flex justify-end pt-6 border-t border-gray-200">
                                    <button 
                                    
                                    id="submitBtn" type="submit"  
                                    value="submit" class="px-8 py-3 bg-orange-600 text-white rounded-lg font-bold hover:bg-orange-700 transition flex items-center">
                                        Submit Registration
                                    
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="flex items-center text-gray-600 my-5 text-xs">
                                    If you need financial assistance to purchase your ticket, please email CRConference2025@ridgewaysbaptistchurch.org , text or call 0740285959.
                                </div>


                            </form>
                            
                            
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="md:w-1/3">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden sticky top-8">
                        <div class="bg-orange-600 text-white p-6">
                            <h2 class="text-xl font-bold flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                                </svg>
                                Event Summary
                            </h2>
                        </div>
                        <div class="p-6">
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-3">Celebrate Recovery Weekend</h3>
                                <div class="flex items-center text-gray-600 mb-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                    13 - 15 August
                                </div>
                                <div class="flex items-center text-gray-600 mb-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    8 AM - 5 PM
                                </div>
                                <div class="flex items-start text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                    Ridgeways Baptist Church<br>
                                    Nairobi<br>
                                    Kenya
                                </div>
                            </div>

                            <div class="border-t border-gray-200 pt-4">
                                <a href="https://maps.app.goo.gl/R9TiGyyUTK7No69ZA" class="flex items-center text-orange-600 hover:text-orange-800 mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                                    </svg>
                                    Get Directions
                                </a>
                                <a href="/#faq" class="flex items-center text-orange-600 hover:text-orange-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                                    </svg>
                                    Event FAQs
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Need Help? -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden mt-6">
                        <div class="bg-gray-100 p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                                Need Help?
                            </h3>
                            <p class="text-gray-600 mb-4">If you have any questions about registration, please contact us:</p>
                            <div class="space-y-2">
                                <a href="tel:0740285959" class="flex items-center text-gray-700 hover:text-orange-600 space-x-2">
                                    <!-- Phone Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                    <!-- Text -->
                                    <span>+254740285959</span>
                                </a>                                
                                
                                <a href="mailto:CRConference2025@ridgewaysbaptistchurch.org" class="flex items-center text-gray-700 hover:text-orange-600 space-x-2">
                                    <!-- Email Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                    <!-- Text -->
                                    <span>Email Us</span>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <img class="h-20 mx-auto mb-6" src="{{asset('images/CRLogo.png')}}" alt="Celebrate Recovery">
                <p class="text-gray-400 max-w-2xl mx-auto mb-6">A Christ-centered recovery program for anyone struggling with hurt, pain or addiction of any kind.</p>
                <div class="flex justify-center space-x-6 mb-6">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
                <p class="text-gray-500 text-sm">"He has sent me to bind up the brokenhearted..." — Isaiah 61:1</p>
            </div>
        </div>
    </footer>
<!-- Load reCAPTCHA script -->
    <script>
//     function onSubmit(token) {
//      document.getElementById("registrationForm").submit();
//    }

    // Show/hide CR group field based on selection
    document.getElementById('cr').addEventListener('change', function() {
        const crGroupSection = document.getElementById('crgroup-section');
        if (this.value === 'Yes') {
            crGroupSection.classList.remove('hidden');
        } else {
            crGroupSection.classList.add('hidden');
        }
    });

    document.getElementById('sponsor').addEventListener('change', function() {
    const numSection = document.getElementById('num-section');
    const numSectionInput = document.querySelector('#num-section input'); // Get the actual input field
    
    if (this.value === 'Yes') {
        numSection.classList.remove('hidden');
        numSectionInput.setAttribute('required', 'required'); // Add required attribute
    } else {
        numSection.classList.add('hidden');
        numSectionInput.removeAttribute('required'); // Remove required attribute
    }
});
</script>
</body>
</html>