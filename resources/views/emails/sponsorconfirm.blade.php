<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celebrate Recovery - Sponsorship Confirmation</title>
    <!-- Favicon (logo on browser tab) -->
    <link rel="icon" href="{{ asset('images/CRLogo.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap');
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8fafc;
        }
        .orange-gradient {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <div class="orange-gradient py-6 px-4 text-center">
        <div class="max-w-2xl mx-auto">
            <img src="https://celebraterecovery.com/wp-content/uploads/2022/08/cr-logo-white.png" alt="Celebrate Recovery" class="h-16 mx-auto mb-4">
            <h1 class="text-3xl font-bold text-white">Your Generous Sponsorship</h1>
            <p class="text-orange-100 mt-2">Thank you for helping others find healing</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden my-8">
        <div class="p-8">
            <div class="flex items-center mb-6">
                <div class="bg-orange-100 p-3 rounded-full mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-semibold text-gray-800">Sponsorship Confirmed!</h2>
            </div>

            <p class="text-gray-700 mb-6">Dear {{$user['name'] }},</p>
            <p class="text-gray-700 mb-4">Your generous sponsorship for <span class="font-semibold text-orange-600">${{['']}}</span> to attend Celebrate Recovery has been processed. While you won't be joining us in person, your support is making this life-changing experience possible for others.</p>

            <div class="bg-orange-50 border-l-4 border-orange-500 p-4 mb-6">
                <h3 class="font-bold text-orange-800 mb-2">Sponsorship Details:</h3>
                {{-- <p class="text-gray-700"><span class="font-medium">Recipient:</span> [Recipient Name]</p> --}}
                <p class="text-gray-700"><span class="font-medium">Event Date:</span> 13 - 15 August</p>
                <p class="text-gray-700"><span class="font-medium">Number Sponsored:</span> {{$user['sponsor']}} attendees</p>
                <p class="text-gray-700"><span class="font-medium">Location:</span> Ridgeways Baptist Church, Nairobi Kenya</p>
            </div>

            <div class="border border-gray-200 rounded-lg p-6 mb-6">
                <h3 class="font-bold text-gray-800 mb-4 text-center">Your Sponsorship</h3>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-600">Sponsorship ID:</span>
                    <span class="font-medium">[SponsorID]</span>
                </div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-600">Sponsorship Level:</span>
                    <span class="font-medium">[Level]</span>
                </div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-600">Tax Receipt:</span>
                    <span class="font-medium">Attached (PDF)</span>
                </div>
                <div class="flex justify-between items-center font-bold text-orange-600 mt-4 pt-4 border-t border-gray-200">
                    <span>Total Contribution:</span>
                    <span>[TotalAmount]</span>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <h4 class="font-bold text-gray-800 mb-2">Your Impact:</h4>
                <p class="text-gray-700 mb-3">"Each of you should give what you have decided in your heart to give, not reluctantly or under compulsion, for God loves a cheerful giver."</p>
                <p class="text-orange-600 text-right">— 2 Corinthians 9:7 (NIV)</p>
            </div>

            <div class="text-center mt-8">
                <a href="[RecipientThankYouLink]" class="inline-block bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 px-6 rounded-lg transition duration-200 mr-4">
                    Send Encouragement
                </a>
                <a href="[DonationPortal]" class="inline-block border border-orange-600 text-orange-600 hover:bg-orange-50 font-bold py-3 px-6 rounded-lg transition duration-200">
                    Sponsor Another
                </a>
                <p class="text-sm text-gray-500 mt-4">Need to update your sponsorship? <a href="[ContactEmail]" class="text-orange-600 hover:underline">Contact us</a></p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="max-w-2xl mx-auto text-center text-gray-500 text-sm py-6">
        <p>Celebrate Recovery - [Church Name]</p>
        <p class="mt-1">[Church Address] • [Phone Number]</p>
        <div class="flex justify-center space-x-4 mt-4">
            <a href="[FacebookLink]" class="text-orange-500 hover:text-orange-700">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path></svg>
            </a>
            <a href="[InstagramLink]" class="text-orange-500 hover:text-orange-700">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
        <p class="mt-4">"Whoever is kind to the poor lends to the Lord, and he will reward them for what they have done." — Proverbs 19:17</p>
    </div>
</body>
</html>