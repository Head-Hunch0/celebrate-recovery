<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_green.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CheckOut </title>
    <!-- Favicon (logo on browser tab) -->
    <link rel="icon" href="{{ asset('images/CRLogo.png') }}" type="image/png">
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
        <div class="pt-10 flex items-center justify-center">

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


            <section class="bg-white py-8 rounded-xl shadow-lg antialiased dark:bg-gray-900 md:py-16">
                <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                  <div class="mx-auto max-w-5xl">
                    <div class="flex align-items-end px-8 justify-content-end">
                        
                        <div id="toast-success" class="flex items-center w-full max-w-md p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-lg dark:text-gray-400 dark:bg-gray-800" role="alert">
                            <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                            <div class="ms-3 text-sm font-normal">{{$uuid}}</div>
                            
                        </div>
                    </div>
              

                    <div class="mt-6 p-8 rounded-lg sm:mt-8 lg:flex lg:items-start lg:gap-12">
                      <form action="{{ route('payment.sponsor') }}" method="POST" class="w-full rounded-lg border border-gray-200 bg-white p-4 shadow-lg dark:border-gray-700 dark:bg-gray-800 sm:p-6 lg:max-w-xl lg:p-8">
                        @csrf
                        <div class="mb-6 gap-4 px-6 py-2">

                            <input type="hidden" name="uuid" value="{{ $uuid }}">
                            <input type="hidden" name="price" value="{{ $total }}">

                            <div id="toast-success" class="flex items-center w-full p-4 mb-4 text-gray-900 bg-green-400 rounded-lg shadow-lg dark:text-gray-400 dark:bg-gray-800" role="alert">
                                <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-white rounded-lg dark:bg-green-800 dark:text-green-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                                <div class="ms-3 text-sm font-normal">Thank you for registering for the Celebrate Recovery Kenya Conference on August 13 - 15, 2025!</div>
                                
                            </div>

                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Please use the details below to pay for your registration via MPESA:
        
                                <ul class="max-w-md space-y-2 text-gray-500 list-inside dark:text-gray-400 my-4">
                                    
                                    <li class="flex items-center">
                                        <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                        </svg>
                                        Safaricom Mpesa
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                        </svg>
                                        
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                        </svg>
                                        Business no: 522533
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                        </svg>
                                        Acc: No. 7983980
                                    </li>
                                    
                                </ul>
                
                                </p>

                                <p class="text-base font-normal text-gray-500 dark:text-gray-400 mb-2">Additional payment options will be added to this website shortly.</p>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400 mb-2">This registration confirmation has been sent to you via email.  Please retain this email for your records.</p>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400 mb-2">If you have question or concerns please contact <br> <a class="text-blue-700" href="tel:+254740285959">+254740285959</a> 
                                   <br> or <br> <a class="text-blue-700" href="mailto:CRConference2025@ridgewaysbaptistchurch.org">CRConference2025@ridgewaysbaptistchurch.org</a>
                                </p>
                        </div>
              
                        <div class="flex justify-center items-center">
                            <button type="submit" class="focus:outline-none text-gray-900 shadow-lg bg-green-400 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-3 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Confirm</button>
                        </div>
                      </form>
              
                      <div class="mt-6 px-6 grow sm:mt-8 lg:mt-0">
                        <div class="space-y-4 rounded-lg shadow-lg border border-gray-300 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-800">
                          <div class="space-y-2">
                            <div class="flex flex-col">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Price</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">KES {{$ticket}}</dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400"></dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">USD {{$ticketUsd}}</dd>
                                </dl>
                            </div>  
                            
                            <div class="flex flex-col">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Sponsoring</dt>
                                    <dd class="text-base font-medium text-green-500">KES {{$sponsoring}}</dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400"></dt>
                                    <dd class="text-base font-medium text-green-500">USD {{$sponsoringUsd}}</dd>
                                </dl>
                            </div>

                          </div>
              
                          <div class="flex flex-col border-t border-gray-200 pt-2 dark:border-gray-700">
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white">KES {{$total}}</dd>
                            </dl>
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-bold text-gray-900 dark:text-white"></dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white">USD {{$totalUsd}}</dd>
                            </dl>

                            <p class="text-sm max-w-sm text-orange-500 dark:text-gray-400 my-3 text-center">
                                If you are paying with PayPal or by credit card, please make note of your total shown here.
                            </p>
                        </div>
              
                        <div class="mt-6 flex items-center pt-10 px-6 justify-center gap-8">
                          <img class="h-8 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/paypal.svg" alt="" />
                          <img class="hidden h-8 w-auto dark:flex" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/paypal-dark.svg" alt="" />
                          <img class="h-8 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa.svg" alt="" />
                          <img class="hidden h-8 w-auto dark:flex" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa-dark.svg" alt="" />
                          <img class="h-8 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/mastercard.svg" alt="" />
                          <img class="hidden h-8 w-auto dark:flex" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/mastercard-dark.svg" alt="" />
                        </div>
                      </div>
                    </div>
              
                    
                  </div>
                </div>

                <!-- Main modal -->

              </section>
              

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>