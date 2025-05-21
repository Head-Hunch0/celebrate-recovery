<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invalid Ticket | Celebrate Recovery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Source+Sans+Pro:wght@400;600&display=swap');
        
        body {
            font-family: 'Source Sans Pro', sans-serif;
            
        }
        
        .header-title {
            font-family: 'Playfair Display', serif;
        }
        
        .scripture-box {
            background: linear-gradient(to right, #fff7ed, #fed7aa);
            border-left: 4px solid #f97316;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center p-6">
    <div class="max-w-md w-full bg-white border-2 border-gray-400 rounded-xl shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-faith-orange-600 p-6 text-center text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h1 class="header-title text-3xl font-bold text-red-500 mb-5">Invalid Ticket </h1>
            <p class="text-orange-400 text-2xl mt-2">{{$ticketNumber}}</p>
            <p class="text-orange-400 text-2xl mt-2">Celebrate Recovery</p>
        </div>
        
        <!-- Content -->
        <div class="p-6">
            <div class="scripture-box p-4 rounded-lg mb-6">
                <p class="text-faith-orange-800 italic text-center">
                    "The Lord is close to the brokenhearted and saves those who are crushed in spirit."
                    <span class="block text-sm mt-1 text-faith-orange-600">- Psalm 34:18 (NIV)</span>
                </p>
            </div>
            
            <div class="space-y-4 text-center">
                <p class="text-gray-700">
                    We couldn't validate your ticket. This may be because:
                </p>
                
                <ul class="text-left list-disc pl-5 space-y-2 text-gray-600">
                    <li>The ticket does not exist</li>
                    <li>The QR code was damaged or incomplete</li>
                    <li>The ticket wasn't properly issued</li>
                </ul>
                
                <div class="pt-4">
                    <p class="font-semibold text-gray-800">Please contact our team for assistance:</p>
                    <p class="text-faith-orange-600 mt-1">support@celebraterecovery.org</p>
                    <p class="text-gray-500 mt-2">or visit the registration desk</p>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 text-center">
            <a href="/" class="inline-flex items-center text-faith-orange-600 hover:text-faith-orange-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Return to Home
            </a>
        </div>
    </div>
    
    <!-- Watermark -->
    <p class="mt-8 text-sm text-gray-400 text-center">
        Celebrate Recovery - Finding Freedom in Christ
    </p>
</body>
</html>