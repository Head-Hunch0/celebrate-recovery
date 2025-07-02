<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <!-- Favicon (logo on browser tab) -->
    <link rel="icon" href="{{ asset('images/CRLogo.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        orange: {
                            500: '#F97316',
                            600: '#EA580C',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-2xl w-full bg-white rounded-xl shadow-lg overflow-hidden border border-orange-500/20">
        <!-- Header -->
        <div class="bg-orange-500 p-6 text-center">
            <div class="mx-auto bg-white rounded-full w-20 h-20 flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h1 class="text-2xl md:text-3xl font-bold text-white mt-2">Payment Successful!</h1>
        </div>
        
        <!-- Content -->
        <div class="p-6 md:p-8 space-y-6">
            <div class="text-center">
                <p class="text-lg md:text-xl text-gray-800">
                    Thank you for registering and paying for the event!
                </p>
                <p class="mt-4 text-gray-600">
                    A confirmation email has been sent to your registered email address.
                </p>
                <p class="mt-2 text-gray-600">
                    Your ticket information will be shared with you shortly.
                </p>
            </div>
            
            <div class="bg-orange-50 rounded-lg p-6 border border-orange-100">
                <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <svg class="h-5 w-5 text-orange-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    What's Next?
                </h2>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-orange-500 mt-0.5 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-gray-700">Check your email for the payment confirmation</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-orange-500 mt-0.5 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-gray-700">You'll receive your tickets within 24 hours</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-orange-500 mt-0.5 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-gray-700">Contact support if you have any questions</span>
                    </li>
                </ul>
            </div>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4 pt-4">
                <a href="/" class="px-6 py-3 border border-orange-500 text-orange-500 hover:bg-orange-50 font-medium rounded-lg text-center transition duration-200">
                    Back to Home
                </a>
            </div>
        </div>
        
        <!-- Footer -->
        {{-- <div class="bg-orange-50 px-6 py-4 text-center border-t border-orange-100">
            <p class="text-sm text-gray-600">
                Need help? <a href="#" class="text-orange-500 hover:underline font-medium">Contact our support team</a>
            </p>
        </div> --}}
    </div>
</body>
</html>