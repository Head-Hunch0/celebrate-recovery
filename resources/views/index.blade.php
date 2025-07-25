<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celebrate Recovery - Healing Begins Here</title>
    <!-- Favicon (logo on browser tab) -->
    <link rel="icon" href="{{ asset('images/CRLogo.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, rgba(249,115,22,0.9) 0%, rgba(234,88,12,0.95) 100%);
        }
        .countdown-box {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(5px);
        }
        .bg-image{
            background-image:  linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.1)), url("{{ asset('images/worship4.jpg') }}");
            background-size: cover;
            /* padding-top: 10px; */
        }
    </style>
</head>
<body class="font-sans bg-white">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-24 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <img class="h-20" src="{{asset('images/CRLogo.png')}}" alt="Celebrate Recovery"> <span class="mb-5">Celebrate Recovery</span> 
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-8">
                        <a href="#about" class="text-gray-700 hover:text-orange-600 px-3 py-2 font-medium">About</a>
                        <a href="#schedule" class="text-gray-700 hover:text-orange-600 px-3 py-2 font-medium">Schedule</a>
                        <a href="#testimonials" class="text-gray-700 hover:text-orange-600 px-3 py-2 font-medium">Stories</a>
                        <a href="/register" class="bg-orange-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-orange-700 transition duration-200">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="bg-center bg-no-repeat bg-image bg-gray-500 bg-blend-multiply" style="height: 100vh;">
        <div class="px-4 my-auto mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb pt-6 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Celebrate Recovery</h1>
            <h2 class="mb-2 pt-6 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Conference</h2>
            
            <div class="py-6 px-4 mx-auto max-w-screen-xl text-center lg:py-8 z-10 relative">
                <h1 class="mb text-2xl pt-10 font-extrabold tracking-tight leading-none text-white md:text-xl lg:text-2xl dark:text-white">August 13th - 15th <br> Ridgeways Baptist Church <br> Nairobi, Kenya</h1>
                <p class="mb text-lg  font-normal text-white lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Church Lane off Kiambu Rd</p>
                <p class="mb text-lg pt-10 font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Celebrate Recovery(CR) is a Christ-centered ministry that helps people overcome <br> "Hurts, Hang-ups and Habits". <br> It is open to anyone who needs support, regardless of their struggles.</p>
        </div>   
        </div>
        
    </section>
    

    <!-- Hero Section -->
    <section class="hero-gradient bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Find Freedom From Your Hurts</h1>
            <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto">Join us for a transformative Celebrate Recovery event where healing begins and lives are changed</p>
            
            <div class="max-w-md mx-auto grid grid-cols-4 gap-4 mb-12">
                <div class="countdown-box rounded-lg p-4">
                    <div class="text-3xl font-bold" id="days">00</div>
                    <div class="text-sm">Days</div>
                </div>
                <div class="countdown-box rounded-lg p-4">
                    <div class="text-3xl font-bold" id="hours">00</div>
                    <div class="text-sm">Hours</div>
                </div>
                <div class="countdown-box rounded-lg p-4">
                    <div class="text-3xl font-bold" id="minutes">00</div>
                    <div class="text-sm">Minutes</div>
                </div>
                <div class="countdown-box rounded-lg p-4">
                    <div class="text-3xl font-bold" id="seconds">00</div>
                    <div class="text-sm">Seconds</div>
                </div>
            </div>
                <a href="/register" class="inline-block mb-4 bg-white text-orange-600 max-w-sm font-bold py-4 px-10 rounded-lg text-lg hover:bg-gray-100 transition duration-200 shadow-lg">
                    Secure Your Spot
                </a>
                <a href="/sponsor" class="inline-block bg-white text-orange-600 max-w-sm font-bold py-4 px-10 rounded-lg text-lg hover:bg-gray-100 transition duration-200 shadow-lg">
                    Sponsor a Participant
                </a>

                <div class="mt-6 max-w-md mx-auto text-white">
                    <p class="inline-block bg-white text-orange-600 max-w-sm font-bold py-4 px-10 rounded-lg text-sm hover:bg-gray-100 transition duration-200 shadow-lg">
                        Already registered ? Please review your registration email and click the "Complete Your Payment Now" link to make your payments.
                    </p>
                    <p></p>
                </div>
        

        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">What is Celebrate Recovery?</h2>
                <div class="w-20 h-1 bg-orange-600 mx-auto"></div>
            </div>
            
            <div class="md:flex items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 md:pr-10">
                    <img src="{{asset('images/worship4.jpg')}}" alt="Celebrate Recovery Group" class="rounded-lg shadow-xl">
                </div>
                <div class="md:w-1/2">
                    <p class="text-gray-700 mb-6 text">Celebrate Recovery is a Christ-centered, 12-step recovery program for anyone struggling with hurts, hang-ups and habits of any kind.</p>
                    <p class="text-gray-700 mb-6">This special event will explain what Celebrate Recovery is, how it works and how to launch this ministry in your organization.
                        You'll experience powerful worship, authentic testimonies and connect with others who have experienced the healing & transformation Jesus offers through this ministry.
                    </p>
                    <div class="bg-orange-50 border-l-4 border-orange-500 p-4">
                        <p class="text-orange-800 font-medium">"Then you will know the truth, and the truth will set you free."</p>
                        <p class="text-orange-600">— John 8:32 (NIV)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedule Section -->
    <section id="schedule" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Event Schedule</h2>
                <div class="w-20 h-1 bg-orange-600 mx-auto"></div>
            </div>

            <div class="max-w-3xl mx-auto">
                <!-- Wednesday, August 13, 2025 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="p-6">
                        <div class="flex items-start">
                            <div class="bg-orange-100 text-orange-800 rounded-lg p-3 mr-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Wednesday, August 13, 2025</h3>
                                <div class="space-y-4">
                                    @if ($Schedule)
                            
                                        @foreach ($wed as $item)
                                        
                                        <div class="flex">
                                            <div class="text-orange-600 font-medium w-24">                                            
                                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->time)->format('h:i A') }}                                            
                                            </div>
                                            <div class="text-gray-700">{{$item->theme}}</div>
                                        </div>
                                        @endforeach
                                            
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thursday, August 14, 2025 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="p-6">
                        <div class="flex items-start">
                            <div class="bg-orange-100 text-orange-800 rounded-lg p-3 mr-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Thursday, August 14, 2025</h3>
                                <div class="space-y-4">
                                    @if ($Schedule)
                            
                                        @foreach ($thur as $item)
                                        
                                        <div class="flex">
                                            <div class="text-orange-600 font-medium w-24">                                            
                                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->time)->format('h:i A') }}                                            
                                            </div>
                                            <div class="text-gray-700">{{$item->theme}}</div>
                                        </div>
                                        @endforeach
                                            
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Friday, August 15, 2025 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="p-6">
                        <div class="flex items-start">
                            <div class="bg-orange-100 text-orange-800 rounded-lg p-3 mr-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Friday, August 15, 2025</h3>
                                <div class="space-y-4">
                                    @if ($Schedule)
                            
                                        @foreach ($fri as $item)
                                        
                                        <div class="flex">
                                            <div class="text-orange-600 font-medium w-24">                                            
                                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->time)->format('h:i A') }}                                            
                                            </div>
                                            <div class="text-gray-700">{{$item->theme}}</div>
                                        </div>
                                        @endforeach
                                            
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-20 bg-orange-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Changed Lives</h2>
                <div class="w-20 h-1 bg-white mx-auto"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white bg-opacity-10 p-8 rounded-lg backdrop-filter backdrop-blur-sm">
                    <div class="text-orange-200 mb-4">"Celebrate Recovery gave me the tools to break free from my addiction and restore my relationship with God. I'm now 3 years sober!"</div>
                    <div class="font-bold">— Michael T.</div>
                </div>
                <div class="bg-white bg-opacity-10 p-8 rounded-lg backdrop-filter backdrop-blur-sm">
                    <div class="text-orange-200 mb-4">"I came broken from years of abuse and shame. Through this ministry, I found healing and learned to accept God's love for me."</div>
                    <div class="font-bold">— Sarah K.</div>
                </div>
                <div class="bg-white bg-opacity-10 p-8 rounded-lg backdrop-filter backdrop-blur-sm">
                    <div class="text-orange-200 mb-4">"As a spouse of an addict, I needed support too. CR helped me set boundaries while showing Christ's love to my husband."</div>
                    <div class="font-bold">— David &amp; Emily R.</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration -->
    <!-- Speakers Section -->
    <section class="py-16 bg-orange-50 hidden">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-orange-700 mb-4">Featured Speakers</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Join us for three transformative days with these anointed leaders
                </p>
            </div>

            <!-- Day Tabs -->
            <div class="flex justify-center mb-12">
                <div class="inline-flex rounded-xl bg-orange-100 p-1">
                    <button class="day-tab active px-6 py-3 rounded-lg font-medium text-orange-700 bg-white shadow-md" data-day="day1">August 12</button>
                    <button class="day-tab px-6 py-3 rounded-lg font-medium text-gray-600 hover:text-orange-700" data-day="day2">August 13</button>
                    <button class="day-tab px-6 py-3 rounded-lg font-medium text-gray-600 hover:text-orange-700" data-day="day3">August 14</button>
                </div>
            </div>

            <!-- Speakers Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Day 1 -->
                <div class="speaker-day day1 animate__animated animate__fadeIn">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col border border-orange-100">
                        <div class="h-48 bg-gradient-to-r from-orange-500 to-orange-600 flex items-center justify-center">
                            <div class="text-white text-center px-4">
                                <p class="font-bold text-xl">Day 1: August 12</p>
                                <p class="text-orange-100">Breaking Chains</p>
                            </div>
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="flex items-start mb-4">
                                <div class="w-16 h-16 rounded-full bg-orange-100 mr-4 flex items-center justify-center text-orange-600 font-bold text-2xl">SJ</div>
                                <div>
                                    <h3 class="font-bold text-xl text-gray-800">Dr. Sarah Johnson</h3>
                                    <p class="text-orange-600">Clinical Psychologist</p>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4">"Finding Freedom from Addiction Through Faith" - Sharing groundbreaking research on faith-based recovery.</p>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>9:00 AM - Main Hall</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="speaker-day day1 animate__animated animate__fadeIn animate__delay-1s">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col border border-orange-100">
                        <div class="h-48 bg-gradient-to-r from-orange-500 to-orange-600 flex items-center justify-center">
                            <div class="text-white text-center px-4">
                                <p class="font-bold text-xl">Day 1: August 12</p>
                                <p class="text-orange-100">Breaking Chains</p>
                            </div>
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="flex items-start mb-4">
                                <div class="w-16 h-16 rounded-full bg-orange-100 mr-4 flex items-center justify-center text-orange-600 font-bold text-2xl">MB</div>
                                <div>
                                    <h3 class="font-bold text-xl text-gray-800">Pastor Michael Brown</h3>
                                    <p class="text-orange-600">Recovery Ministry Leader</p>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4">"The Healing Power of Testimony" - A personal journey from addiction to ministry that will inspire hope.</p>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>2:00 PM - Chapel</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="speaker-day day1 animate__animated animate__fadeIn animate__delay-2s">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col border border-orange-100">
                        <div class="h-48 bg-gradient-to-r from-orange-500 to-orange-600 flex items-center justify-center">
                            <div class="text-white text-center px-4">
                                <p class="font-bold text-xl">Day 1: August 12</p>
                                <p class="text-orange-100">Breaking Chains</p>
                            </div>
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="flex items-start mb-4">
                                <div class="w-16 h-16 rounded-full bg-orange-100 mr-4 flex items-center justify-center text-orange-600 font-bold text-2xl">RC</div>
                                <div>
                                    <h3 class="font-bold text-xl text-gray-800">Dr. Rebecca Chen</h3>
                                    <p class="text-orange-600">Family Therapist</p>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4">"Restoring Broken Relationships" - Practical biblical principles for healing family wounds caused by addiction.</p>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>6:30 PM - Fellowship Hall</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Day 2 -->
                <div class="speaker-day day2 hidden animate__animated animate__fadeIn">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col border border-orange-100">
                        <div class="h-48 bg-gradient-to-r from-orange-500 to-orange-600 flex items-center justify-center">
                            <div class="text-white text-center px-4">
                                <p class="font-bold text-xl">Day 2: August 13</p>
                                <p class="text-orange-100">Walking in Freedom</p>
                            </div>
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="flex items-start mb-4">
                                <div class="w-16 h-16 rounded-full bg-orange-100 mr-4 flex items-center justify-center text-orange-600 font-bold text-2xl">DW</div>
                                <div>
                                    <h3 class="font-bold text-xl text-gray-800">Bishop David Williams</h3>
                                    <p class="text-orange-600">Author of "Grace for the Wounded"</p>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4">"Grace That Transforms" - Teaching on receiving and extending God's grace in recovery.</p>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>9:00 AM - Main Hall</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="speaker-day day2 hidden animate__animated animate__fadeIn animate__delay-1s">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col border border-orange-100">
                        <div class="h-48 bg-gradient-to-r from-orange-500 to-orange-600 flex items-center justify-center">
                            <div class="text-white text-center px-4">
                                <p class="font-bold text-xl">Day 2: August 13</p>
                                <p class="text-orange-100">Walking in Freedom</p>
                            </div>
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="flex items-start mb-4">
                                <div class="w-16 h-16 rounded-full bg-orange-100 mr-4 flex items-center justify-center text-orange-600 font-bold text-2xl">JP</div>
                                <div>
                                    <h3 class="font-bold text-xl text-gray-800">Dr. James Peterson</h3>
                                    <p class="text-orange-600">Christian Counselor</p>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4">"Renewing the Mind" - Biblical strategies for overcoming destructive thought patterns.</p>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>11:30 AM - Chapel</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="speaker-day day2 hidden animate__animated animate__fadeIn animate__delay-2s">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col border border-orange-100">
                        <div class="h-48 bg-gradient-to-r from-orange-500 to-orange-600 flex items-center justify-center">
                            <div class="text-white text-center px-4">
                                <p class="font-bold text-xl">Day 2: August 13</p>
                                <p class="text-orange-100">Walking in Freedom</p>
                            </div>
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="flex items-start mb-4">
                                <div class="w-16 h-16 rounded-full bg-orange-100 mr-4 flex items-center justify-center text-orange-600 font-bold text-2xl">LT</div>
                                <div>
                                    <h3 class="font-bold text-xl text-gray-800">Pastor Lisa Thompson</h3>
                                    <p class="text-orange-600">Women's Recovery Ministry</p>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4">"Healing the Wounded Heart" - Special session for women on emotional and spiritual restoration.</p>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>3:00 PM - Women's Center</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Day 3 -->
                <div class="speaker-day day3 hidden animate__animated animate__fadeIn">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col border border-orange-100">
                        <div class="h-48 bg-gradient-to-r from-orange-500 to-orange-600 flex items-center justify-center">
                            <div class="text-white text-center px-4">
                                <p class="font-bold text-xl">Day 3: August 14</p>
                                <p class="text-orange-100">Living Restored</p>
                            </div>
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="flex items-start mb-4">
                                <div class="w-16 h-16 rounded-full bg-orange-100 mr-4 flex items-center justify-center text-orange-600 font-bold text-2xl">MR</div>
                                <div>
                                    <h3 class="font-bold text-xl text-gray-800">Pastor Mark Rodriguez</h3>
                                    <p class="text-orange-600">Founder, Chains Broken Ministry</p>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4">"Maintaining Your Freedom" - Practical discipleship for lasting recovery and spiritual growth.</p>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>10:00 AM - Main Hall</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="speaker-day day3 hidden animate__animated animate__fadeIn animate__delay-1s">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col border border-orange-100">
                        <div class="h-48 bg-gradient-to-r from-orange-500 to-orange-600 flex items-center justify-center">
                            <div class="text-white text-center px-4">
                                <p class="font-bold text-xl">Day 3: August 14</p>
                                <p class="text-orange-100">Living Restored</p>
                            </div>
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="flex items-start mb-4">
                                <div class="w-16 h-16 rounded-full bg-orange-100 mr-4 flex items-center justify-center text-orange-600 font-bold text-2xl">AS</div>
                                <div>
                                    <h3 class="font-bold text-xl text-gray-800">Dr. Angela Smith</h3>
                                    <p class="text-orange-600">Christian Psychiatrist</p>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4">"The Science of Spiritual Growth" - How brain chemistry changes through spiritual disciplines.</p>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>1:30 PM - Chapel</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="speaker-day day3 hidden animate__animated animate__fadeIn animate__delay-2s">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col border border-orange-100">
                        <div class="h-48 bg-gradient-to-r from-orange-500 to-orange-600 flex items-center justify-center">
                            <div class="text-white text-center px-4">
                                <p class="font-bold text-xl">Day 3: August 14</p>
                                <p class="text-orange-100">Living Restored</p>
                            </div>
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="flex items-start mb-4">
                                <div class="w-16 h-16 rounded-full bg-orange-100 mr-4 flex items-center justify-center text-orange-600 font-bold text-2xl">TG</div>
                                <div>
                                    <h3 class="font-bold text-xl text-gray-800">Bishop Thomas Green</h3>
                                    <p class="text-orange-600">Closing Keynote Speaker</p>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4">"Your New Life in Christ" - A powerful commissioning service to send you forth in victory.</p>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>6:00 PM - Main Hall</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
      

    <!-- FAQ -->
    <section class="py-20 bg-gray-50" id="faq">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                <div class="w-20 h-1 bg-orange-600 mx-auto"></div>
            </div>

            <div class="max-w-3xl mx-auto">
                <div class="bg-white shadow-md rounded-lg overflow-hidden mb-4">
                    <button class="faq-toggle w-full text-left p-6 focus:outline-none">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-medium text-gray-900">Is Celebrate Recovery only for alcohol or drug addiction?</h3>
                            <svg class="h-6 w-6 text-orange-600 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div class="faq-content px-6 pb-6 hidden">
                        <p class="text-gray-700">No, Celebrate Recovery is for anyone with hurts, hang-ups or habits. This includes (but isn't limited to) alcohol and drugs, but also codependency, pornography, eating disorders, gambling, depression, abuse, grief, and more.</p>
                    </div>
                </div>

                <div class="bg-white shadow-md rounded-lg overflow-hidden mb-4">
                    <button class="faq-toggle w-full text-left p-6 focus:outline-none">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-medium text-gray-900">What should I expect at the event?</h3>
                            <svg class="h-6 w-6 text-orange-600 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div class="faq-content px-6 pb-6 hidden">
                        <p class="text-gray-700">You'll experience worship, teaching or testimony, and small group discussions. Everything is confidential and you only share what you're comfortable sharing. No one will pressure you to speak.</p>
                    </div>
                </div>

                
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-orange-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-6">Ready to Begin Your Healing Journey?</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Take the first step toward freedom today</p>
            <a href="/register" class="inline-block bg-white text-orange-600 font-bold py-4 px-10 rounded-lg text-lg hover:bg-gray-100 transition duration-200 shadow-lg">
                Register Now
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="md:flex md:justify-between">
                <div class="mb-8 md:mb-0">
                    <img class="h-20 mb-4" src="{{asset('images/CRLogo.png')}}" alt="Celebrate Recovery">
                    <p class="text-gray-400 max-w-md">A Christ-centered recovery program for anyone struggling with hurt, pain or addiction of any kind.</p>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:grid-cols-3">
                    <div>
                        <h3 class="text-sm font-semibold text-orange-400 tracking-wider uppercase mb-4">Event</h3>
                        <ul class="space-y-2">
                            <li><a href="#about" class="text-gray-300 hover:text-white">About</a></li>
                            <li><a href="#schedule" class="text-gray-300 hover:text-white">Schedule</a></li>
                            <li><a href="/register" class="text-gray-300 hover:text-white">Register</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-orange-400 tracking-wider uppercase mb-4">Connect With Us</h3>
                        <div class="flex space-x-6">
                            <a href="https://www.facebook.com/profile.php?id=61575750338597" target="_blank" class="text-gray-400 hover:text-white">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/cr.kenya" target="_blank" class="text-gray-400 hover:text-white">
                                <span class="sr-only">Instagram</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-300">Follow us for updates and encouragement</p>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-orange-400 tracking-wider uppercase mb-4">Contact</h3>
                        <ul class="space-y-2">
                            <li class="text-gray-300">Ridgeways Baptist Church</li>
                            <li class="text-gray-300">
                                <a href="tel:0740285959" class="flex items-center text-gray-700 hover:text-orange-600 space-x-2">
                                    <!-- Phone Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                    <!-- Text -->
                                    <span>+254740285959</span>
                                </a>
                                
                            </li>
                            <li class="text-gray-300">
                                <a href="mailto:CRConference2025@ridgewaysbaptistchurch.org" class="flex items-center text-gray-700 hover:text-orange-600 space-x-2">
                                <!-- Email Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                                <!-- Text -->
                                <span>Email Us</span>
                            </a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-800 text-center">
                <p class="text-gray-400 text-sm">"He has sent me to bind up the brokenhearted, to proclaim freedom for the captives and release from darkness for the prisoners." — Isaiah 61:1</p>
            </div>
        </div>
    </footer>

    <script>
        // Countdown Timer
        

        const countdown = () => {
            // Set the date for 13 August, 2025 at midnight (you can change the time too)
            const endDate = new Date("2025-08-13T00:00:00").getTime();
            const now = new Date().getTime();
            const distance = endDate - now;

            if (distance > 0) {
                document.getElementById("days").innerText = Math.floor(distance / (1000 * 60 * 60 * 24));
                document.getElementById("hours").innerText = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                document.getElementById("minutes").innerText = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                document.getElementById("seconds").innerText = Math.floor((distance % (1000 * 60)) / 1000);
            } else {
                document.getElementById("days").innerText = 0;
                document.getElementById("hours").innerText = 0;
                document.getElementById("minutes").innerText = 0;
                document.getElementById("seconds").innerText = 0;
            }
        };

        //

        setInterval(countdown, 1000);
        countdown();

        // FAQ Toggle
        document.querySelectorAll('.faq-toggle').forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                const icon = button.querySelector('svg');

                content.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });


        // Speaker day tabs
        document.querySelectorAll('.day-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                // Update active tab
                document.querySelectorAll('.day-tab').forEach(t => {
                    t.classList.remove('active', 'bg-white', 'shadow-md', 'text-orange-700');
                    t.classList.add('text-gray-600');
                });
                this.classList.add('active', 'bg-white', 'shadow-md', 'text-orange-700');
                this.classList.remove('text-gray-600');
                
                // Show selected day's speakers
                const day = this.getAttribute('data-day');
                document.querySelectorAll('.speaker-day').forEach(speaker => {
                    speaker.classList.add('hidden');
                    speaker.classList.remove('animate__fadeIn', 'animate__delay-1s', 'animate__delay-2s');
                });
                
                const selectedSpeakers = document.querySelectorAll(`.${day}`);
                selectedSpeakers.forEach((speaker, index) => {
                    setTimeout(() => {
                        speaker.classList.remove('hidden');
                        speaker.classList.add('animate__fadeIn');
                        if (index === 1) speaker.classList.add('animate__delay-1s');
                        if (index === 2) speaker.classList.add('animate__delay-2s');
                    }, 50);
                });
            });
        });

    </script>
</body>
</html>