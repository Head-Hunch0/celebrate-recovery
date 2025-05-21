<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celebrate Recovery Ticket</title>
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
    <style>
        .ticket {
            position: relative;
            overflow: hidden;
            border: 2px solid #f97316;
        }
        .ticket:before, .ticket:after {
            content: "";
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: white;
            border-radius: 50%;
            border: 2px solid #f97316;
        }
        .ticket:before {
            top: -10px;
            left: -10px;
        }
        .ticket:after {
            top: -10px;
            right: -10px;
        }
        .perforation {
            position: absolute;
            left: 0;
            right: 0;
            height: 1px;
            background-image: linear-gradient(to right, #e5e7eb 50%, transparent 50%);
            background-size: 20px 1px;
        }
        
        .perforation-top {
            top: 0;
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
        
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <!-- Ticket Component -->
    <div class="max-w-md w-full">
        <div class="ticket bg-white rounded-lg shadow-lg overflow-hidden relative">
            <!-- Cross background icon -->
            <div class="cross-icon">✝</div>
            
            <!-- Perforation lines -->
            <div class="perforation perforation-top"></div>
            <div class="perforation perforation-bottom"></div>
            
            <!-- Ticket Header -->
            <div class="bg-faith-orange-500 p-6 text-white relative">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-2xl font-bold">Celebrate Recovery</h2>
                        <p class="text-orange-100">Finding Freedom in Christ</p>
                    </div>
                    <div class="bg-white text-faith-orange-600 px-3 py-1 rounded-full text-sm font-semibold">
                        #{{ $ticket->number }}
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
                        <p class="font-semibold">Every Friday</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Time</p>
                        <p class="font-semibold">6:30 PM - 9:00 PM</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Location</p>
                        <p class="font-semibold">New Hope Church</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Childcare</p>
                        <p class="font-semibold">Provided</p>
                    </div>
                </div>
                
                <!-- Ministry Description -->
                <div class="mb-6 p-4 bg-orange-50 rounded-lg border border-orange-100">
                    <h3 class="font-semibold text-faith-orange-700 mb-2 text-sm">About Our Ministry</h3>
                    <p class="text-gray-700 text-xs leading-relaxed">
                        Celebrate Recovery (CR) is a Christ-centered ministry that helps people overcome "Hurts, Hang-ups and Habits" through God's healing power in a safe, welcoming community.
                    </p>
                </div>
                
                <!-- QR Code Placeholder -->
                <div class="flex justify-center mb-6">
                    <div class="bg-orange-100 p-4 rounded-lg inline-block border border-orange-200">
                        <div class="w-32 h-32 bg-white flex items-center justify-center text-gray-400">
                            <div class="text-center">
                                <div class="text-4xl text-faith-orange-500">✝</div>
                                <div class="text-xs mt-2 text-faith-orange-600">Scan for Details</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Terms -->
                <p class="text-gray-500 text-xs text-center">
                    All are welcome. Dinner served at 6:30 PM. Confidentiality respected.
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

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    {{-- real use case Ticket --}}
    {{-- <div id="ticketNumber" class="...">
        #{{ $ticket->number }}
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            generateQRCode({
                ticketNumber: "{{ $ticket->number }}",
                event: "Celebrate Recovery",
                date: "{{ $ticket->event_date }}",
                time: "6:30 PM - 9:00 PM",
                location: "New Hope Church"
            });
        });
    </script> --}}



    {{-- // In your ticket.blade.php --}}
{{-- function generateQRCode(ticketNumber) {
    const qrData = {
        ticketId: "{{ $ticket->id }}",
        ticketNumber: ticketNumber,
        event: "Celebrate Recovery",
        date: "{{ $ticket->event_date }}",
        verificationUrl: "{{ url('/api/tickets/verify') }}",
        apiKey: "{{ $ticket->verification_token }}" // Add this to your Ticket model
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
} --}}
</body>
</html>