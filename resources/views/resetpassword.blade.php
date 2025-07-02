<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <title>OptimalStudentRecruitment - Reset Password</title>
    <!-- Favicon (logo on browser tab) -->
    <link rel="icon" href="{{ asset('images/CRLogo.png') }}" type="image/png">
</head>
<body>
    
<div class="flex justify-center items-center h-screen">
    <div class="w-full max-w-lg p-4 bg-white border border-gray-800 rounded-lg shadow-xl sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

        @if (session('status'))
            <div id="toast-top-right" class="fixed flex items-center max-w-xs p-4 space-x-4 text-gray-900 bg-orange-300 divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow-xl top-5 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
                <div class="text-sm font-normal">
                    <ul class="list-disc list-inside list-none">
                        <li>{{ session('status') }}</li>
                    </ul>
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-inherit text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-top-right" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @endif

        <form class="space-y-3 pb-5" action="{{ route('password.email') }}" method="post">
            @csrf
            <h5 class="text-xl p-3 text-center font-medium text-gray-900 dark:text-white">Reset Password</h5>
            
            <div class="py-4">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="example@example.com" required />
            </div>
            
            <button type="submit" class="w-full text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Send Reset Link</button>
            
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300 text-center">
                Remember your password? <a href="/login" class="text-orange-600 hover:underline dark:text-orange-500">Sign in</a>
            </div>
        </form>

        <blockquote class="p-4 my-4 border-s-2 border-red-400 bg-orange-100">
            <p class="text-sm italic font-medium leading-relaxed text-gray-900 dark:text-white">"But those who hope in the LORD will renew their strength. They will soar on wings like eagles; they will run and not grow weary, they will walk and not be faint."</p>
            <p class="text-xs italic font-medium leading-relaxed text-gray-900 dark:text-white">- Isaiah 40:31 (NIV)</p>
        </blockquote>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Auto-dismiss toasts after 5 seconds
        const toasts = document.querySelectorAll('[id^="toast-"]');
        toasts.forEach(toast => {
            setTimeout(() => {
                toast.remove();
            }, 5000);
        });
    });
</script>
</body>
</html>