<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <title>OptimalStudentRecruitment - SignIn </title>
    <!-- Favicon (logo on browser tab) -->
    <link rel="icon" href="{{ asset('images/CRLogo.png') }}" type="image/png">
</head>
<body>
    
<div class="flex justify-center items-center h-screen">
<div class="w-full max-w-lg p-4 bg-white border border-gray-800 rounded-lg shadow-xl sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        @if ($errors->any())
    <div id="toast-top-right" class="fixed flex items-center max-w-xs p-4 space-x-4 text-gray-900 bg-red-200 divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow-xl top-5 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
        <div class="text-sm font-normal">
            <ul class="list-disc list-inside list-none">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
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

@if (session('message') || session('success') || session('error'))
<div id="toast-top-right" class="fixed flex items-center max-w-xs p-4 space-x-4 text-gray-900 bg-orange-300 divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow-xl top-5 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
    <div class="text-sm font-normal">
        <ul class="list-disc list-inside list-none">
            <li>{{ session('message') ?? session('success') ?? session('error') }}</li>
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
    <form class="space-y-3 pb-5" action="/signin" method="post">
        @csrf
        <h5 class="text-xl p-3 text-center font-medium text-gray-900 dark:text-white">Sign In</h5>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="example@example.com" required />
        </div>
        <div class="relative">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
        <button 
            type="button" 
            id="togglePassword" 
            class="inset-y-0 right- flex items-center text-gray-500 dark:text-gray-400">
            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute inset-y-0 right-2 mt-10 flex items-center" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.5 1.904-1.768 3.657-3.542 5-1.774 1.343-3.757 2-5.542 2s-3.768-.657-5.542-2c-1.774-1.343-3.042-3.096-3.542-5z"/>
            </svg>
        </button>
        </div>
        <div class="flex items-start py-4">
            <a href="/forgotpassword" class="ms-auto text-sm text-orange-600 hover:underline dark:text-blue-500">Forgot Password?</a>
        </div>
        <button type="submit" class="w-1/2 text-white bg-orange-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Log In</button>
        
    </form>

    <blockquote class="p-4 my-4 border-s-2 border-red-400 bg-orange-100 ">
        <p class="text-sm italic font-medium leading-relaxed text-gray-900 dark:text-white">"Whatever you do, work at it with all your heart, as working for the Lord, not for human masters."</p>
        <p class="text-xs italic font-medium leading-relaxed text-gray-900 dark:text-white">- Colossians 3:23 (NIV)</p>
    </blockquote>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', () => {
        // Toggle input type between password and text
        const isPasswordVisible = passwordInput.type === 'text';
        passwordInput.type = isPasswordVisible ? 'password' : 'text';

        // Update the icon
        eyeIcon.innerHTML = isPasswordVisible
            ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.5 1.904-1.768 3.657-3.542 5-1.774 1.343-3.757 2-5.542 2s-3.768-.657-5.542-2c-1.774-1.343-3.042-3.096-3.542-5z"/>`
            : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A9.971 9.971 0 0112 19c-4.477 0-8.268-2.943-9.542-7 .431-1.68 1.3-3.2 2.458-4.392M9.172 15.172a4 4 0 005.656-5.656M9.172 15.172L5.39 18.954M9.172 15.172l4.89-4.89"/>`;

            // Set a timeout to revert visibility after 10 seconds
    if (!isPasswordVisible) {
        setTimeout(() => {
            passwordInput.type = 'password';

            // Update the icon back to the "hidden" state
            eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.5 1.904-1.768 3.657-3.542 5-1.774 1.343-3.757 2-5.542 2s-3.768-.657-5.542-2c-1.774-1.343-3.042-3.096-3.542-5z"/>`;
        }, 10000); // 10 seconds
    }
    });
});

</script>
</body>
</html>