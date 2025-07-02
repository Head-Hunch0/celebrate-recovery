<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celebrate Recovery Ticket</title>
    <!-- Favicon (logo on browser tab) -->
    <link rel="icon" href="{{ asset('images/CRLogo.png') }}" type="image/png">
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'faith-orange': {
                            '50': '#fff7ed',
                            '100': '#ffedd5',
                            '200': '#fed7aa',
                            '300': '#fdba74',
                            '400': '#fb923c',
                            '500': '#f97316',
                            '600': '#ea580c',
                            '700': '#c2410c',
                            '800': '#9a3412',
                            '900': '#7c2d12',
                        }
                    }
                }
            }
        }
    </script>
    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <!-- QR Code Library -->
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.1/build/qrcode.min.js"></script>
    <style>
        .ticket {
            position: relative;
            overflow: hidden;
            border: 2px solid #f97316;
        }
        /* Torn edge effect */
        .ticket:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 15px;
            background: linear-gradient(135deg, white 8px, transparent 8px) 0 0,
                        linear-gradient(225deg, white 8px, transparent 8px) 0 0;
            background-repeat: repeat-x;
            background-size: 16px 16px;
        }
        .perforation {
            position: absolute;
            left: 0;
            right: 0;
            height: 1px;
            background-image: linear-gradient(to right, #e5e7eb 50%, transparent 50%);
            background-size: 20px 1px;
        }
        .perforation-bottom {
            bottom: 0;
        }
        .cross-icon {
            position: absolute;
            right: 1rem;
            top: 1rem;
            opacity: 0.1;
            font-size: 4rem;
            color: #f97316;
        }
        .scripture-box {
            background: linear-gradient(to right, #fff7ed, #fed7aa);
        }
        #qrcode canvas {
            width: 100% !important;
            height: auto !important;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <!-- Ticket Component -->
    @if($ticket)
    <div class="max-w-md w-full">
        <div class="ticket bg-white rounded-lg shadow-lg overflow-hidden relative">
            <!-- Cross background icon -->
            <div class="cross-icon">✝</div>
            
            <!-- Perforation line at bottom -->
            <div class="perforation perforation-bottom"></div>
            
            <!-- Ticket Header with torn edge -->
            <div class="bg-faith-orange-500 pt-8 pb-6 px-6 text-white relative">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-2xl font-bold">Celebrate Recovery</h2>
                        <p class="text-orange-100">Finding Freedom in Christ</p>
                    </div>
                    <div id="ticketNumber" class="bg-white text-faith-orange-600 px-3 py-1 rounded-full text-sm font-semibold">
                        #{{$ticketNumber}}
                    </div>
                </div>
            </div>
            
            <!-- Ticket Body -->
            <div class="p-6">
                <div class="mb-6 scripture-box p-4 rounded-lg border border-orange-200">
                    <p class="text-faith-orange-800 italic text-center">
                        "Therefore, if anyone is in Christ, the new creation has come: The old has gone, the new is here!" 
                        <span class="block text-sm mt-1 text-faith-orange-600">- 2 Corinthians 5:17 (NIV)</span>
                    </p>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <p class="text-gray-500 text-sm">Date</p>
                        <p class="font-semibold">August 13 - 15</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Time</p>
                        <p class="font-semibold">8 AM - 5 PM</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Location</p>
                        <p class="font-semibold">Ridgeways Baptist Church
                            </p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Food</p>
                        <p class="font-semibold">Lunch will be provided</p>
                    </div>
                </div>
                
                <!-- Ministry Description -->
                <div class="mb-6 p-4 bg-orange-50 rounded-lg border border-orange-100">
                    <h3 class="font-semibold text-faith-orange-700 mb-2 text-sm">About Our Ministry</h3>
                    <p class="text-gray-700 text-xs leading-relaxed">
                        Celebrate Recovery (CR) is a Christ-centered ministry that helps people overcome "Hurts, Hang-ups and Habits" through God's healing power in a safe, welcoming community.
                    </p>
                </div>
                
                <!-- QR Code Container -->
                <div class="flex justify-center mb-6">
                    <div class="bg-orange-100 p-4 rounded-lg inline-block border border-orange-200">
                        <canvas id="qrcode" class="w-32 h-32 bg-white flex items-center justify-center"></canvas>
                    </div>
                </div>

                <div class="rounded-xl overflow-hidden mt-6">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-600" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            Need Help?
                        </h3>
                        <div class="space-y-2">
                            <div class="flex items-center text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                                +254740285959
                            </div>
                                                        
                        </div>
                    </div>
                </div>
                
                <!-- Terms -->
                <p class="text-gray-500 text-xs text-center">
                    Participants must be 18 + <br> Childcare is not provided. Please plan for your childcare needs.
                </p>
            </div>
            
            <!-- Ticket Footer -->
            <div class="bg-orange-50 px-6 py-4 border-t border-orange-200">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-faith-orange-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-medium text-faith-orange-800">God's Promise</span>
                    </div>
                    <span class="text-xs text-faith-orange-600">"I can do all things through Christ who strengthens me." - Phil. 4:13</span>
                </div>
            </div>
        </div>
        
        <!-- Download button -->
        <div class="mt-6 flex justify-center">
            <button type="button" class="text-white bg-faith-orange-600 hover:bg-faith-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">
                Print This Ticket
            </button>
        </div>
    </div>

    @else
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
        <p>Invalid Ticket</p>
    </div>
    @endif
    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    
    <script>

        function generateQRCode(ticketNumber) {
            const qrData = {
                ticketId: "{{ $ticket->id ?? '' }}",
                ticketNumber: "{{$ticketNumber}}",
                event: "Celebrate Recovery",
                location: "Ridgeways Baptist Church",
                date: "August 13 - 15",
                time: "10:30 AM - 9:00 PM",
            };
            
            const qrString = JSON.stringify(qrData);
            
            QRCode.toCanvas(document.getElementById('qrcode'), qrString, {
                width: 128,
                margin: 1,
                color: {
                    dark: '#7c2d12',
                    light: '#ffffff'
                }
            });
        } 
        // On page load
        document.addEventListener('DOMContentLoaded', function() {

            generateQRCode(ticketNumber);
            
            // Print button functionality
            document.querySelector('button').addEventListener('click', function() {
                window.print();
            });
        });
    </script>
</body>
</html>