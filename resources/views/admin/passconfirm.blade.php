<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Password Update</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            200: '#fed7aa',
                            300: '#fdba74',
                            400: '#fb923c',
                            500: '#f97316',
                            600: '#ea580c',
                            700: '#c2410c',
                            800: '#9a3412',
                            900: '#7c2d12',
                        }
                    }
                }
            }
        }
    </script>
    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .password-strength {
            height: 4px;
            transition: all 0.3s ease;
        }
        .strength-0 { width: 20%; background-color: #ef4444; } /* red */
        .strength-1 { width: 40%; background-color: #f97316; } /* orange */
        .strength-2 { width: 60%; background-color: #eab308; } /* yellow */
        .strength-3 { width: 80%; background-color: #84cc16; } /* lime */
        .strength-4 { width: 100%; background-color: #22c55e; } /* green */
    </style>
</head>
<body class="bg-orange-50">
    <div class="flex min-h-screen items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-orange-200">
                <!-- Header -->
                <div class="bg-primary-600 px-6 py-4">
                    <h2 class="text-xl font-bold text-white flex items-center gap-2">
                        <i class="fas fa-key"></i>
                        <span>Update Admin Password</span>
                    </h2>
                </div>
                
                <!-- Form -->
                <form class="p-6 space-y-6" id="passwordUpdateForm" action="/admin/passupdate" method="POST">
                    @csrf
                    <!-- Current Password -->
                    <div>
                        <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900">
                            Current Password
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                id="current_password" 
                                name="current_password"
                                class="bg-orange-50 border border-orange-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-10"
                                required
                                placeholder="Enter current password">
                            <button type="button" class="absolute right-2.5 bottom-2.5 text-orange-500 hover:text-primary-600 toggle-password" data-target="current_password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <p id="current_password_error" class="mt-1 text-xs text-red-600 hidden"></p>
                    </div>

                    <!-- New Password -->
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
                            New Password
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                id="password" 
                                name="password"
                                class="bg-orange-50 border border-orange-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-10"
                                required
                                placeholder="Enter new password"
                                oninput="checkPasswordStrength()">
                            <button type="button" class="absolute right-2.5 bottom-2.5 text-orange-500 hover:text-primary-600 toggle-password" data-target="password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <!-- Password strength meter -->
                        <div class="mt-2">
                            <div class="flex justify-between mb-1">
                                <span class="text-xs font-medium text-gray-500">Password strength</span>
                                <span id="strength-text" class="text-xs font-medium"></span>
                            </div>
                            <div id="password-strength" class="password-strength strength-0 rounded-full"></div>
                        </div>
                        <!-- Password requirements -->
                        <div class="mt-2 text-xs text-gray-500">
                            <p class="font-medium">Requirements:</p>
                            <ul class="list-disc list-inside space-y-1">
                                <li id="req-length" class="text-gray-400"><i class="fas fa-times mr-1"></i> 8+ characters</li>
                                <li id="req-uppercase" class="text-gray-400"><i class="fas fa-times mr-1"></i> Uppercase letter</li>
                                <li id="req-lowercase" class="text-gray-400"><i class="fas fa-times mr-1"></i> Lowercase letter</li>
                                <li id="req-number" class="text-gray-400"><i class="fas fa-times mr-1"></i> Number</li>
                                <li id="req-special" class="text-gray-400"><i class="fas fa-times mr-1"></i> Special character</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">
                            Confirm New Password
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                name="password_confirmation"
                                class="bg-orange-50 border border-orange-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-10"
                                required
                                placeholder="Confirm new password">
                            <button type="button" class="absolute right-2.5 bottom-2.5 text-orange-500 hover:text-primary-600 toggle-password" data-target="password_confirmation">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <p id="password_confirmation_error" class="mt-1 text-xs text-red-600 hidden"></p>
                    </div>
                    <input type="text" name="user" value="{{ $user }}" hidden>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors duration-200">
                            Update Password
                        </button>
                    </div>
                </form>
            </div>

            <!-- Success Modal -->
            {{-- <div id="successModal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow">
                        <div class="p-4 md:p-5 text-center">
                            <div class="w-12 h-12 rounded-full bg-orange-100 p-2 flex items-center justify-center mx-auto mb-3.5">
                                <i class="fas fa-check text-primary-500 text-xl"></i>
                            </div>
                            <h3 class="mb-2 text-lg font-semibold text-gray-900">Password Updated!</h3>
                            <p class="text-gray-500 mb-4">Your password has been successfully updated.</p>
                            <button data-modal-hide="successModal" type="button" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                Continue
                            </button>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const icon = this.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        });

        // Password strength checker
        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            let strength = 0;
            
            // Check length
            const hasLength = password.length >= 8;
            document.getElementById('req-length').className = hasLength ? 'text-green-500' : 'text-gray-400';
            document.getElementById('req-length').querySelector('i').className = hasLength ? 'fas fa-check mr-1' : 'fas fa-times mr-1';
            if (hasLength) strength++;
            
            // Check uppercase
            const hasUpper = /[A-Z]/.test(password);
            document.getElementById('req-uppercase').className = hasUpper ? 'text-green-500' : 'text-gray-400';
            document.getElementById('req-uppercase').querySelector('i').className = hasUpper ? 'fas fa-check mr-1' : 'fas fa-times mr-1';
            if (hasUpper) strength++;
            
            // Check lowercase
            const hasLower = /[a-z]/.test(password);
            document.getElementById('req-lowercase').className = hasLower ? 'text-green-500' : 'text-gray-400';
            document.getElementById('req-lowercase').querySelector('i').className = hasLower ? 'fas fa-check mr-1' : 'fas fa-times mr-1';
            if (hasLower) strength++;
            
            // Check number
            const hasNumber = /[0-9]/.test(password);
            document.getElementById('req-number').className = hasNumber ? 'text-green-500' : 'text-gray-400';
            document.getElementById('req-number').querySelector('i').className = hasNumber ? 'fas fa-check mr-1' : 'fas fa-times mr-1';
            if (hasNumber) strength++;
            
            // Check special char
            const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);
            document.getElementById('req-special').className = hasSpecial ? 'text-green-500' : 'text-gray-400';
            document.getElementById('req-special').querySelector('i').className = hasSpecial ? 'fas fa-check mr-1' : 'fas fa-times mr-1';
            if (hasSpecial) strength++;
            
            // Update strength meter
            const strengthMeter = document.getElementById('password-strength');
            strengthMeter.className = `password-strength strength-${strength} rounded-full`;
            
            // Update strength text
            const strengthText = document.getElementById('strength-text');
            const strengthLabels = ['Very Weak', 'Weak', 'Moderate', 'Strong', 'Very Strong'];
            const strengthColors = ['text-red-500', 'text-orange-500', 'text-yellow-500', 'text-lime-500', 'text-green-500'];
            strengthText.textContent = strengthLabels[strength];
            strengthText.className = `text-xs font-medium ${strengthColors[strength]}`;
        }

        // Form validation
        document.getElementById('passwordUpdateForm').addEventListener('submit', function(e) {
            // e.preventDefault();
            
            // Clear previous errors
            document.getElementById('current_password_error').classList.add('hidden');
            document.getElementById('password_confirmation_error').classList.add('hidden');
            
            // Get values
            const currentPassword = document.getElementById('current_password').value;
            const newPassword = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            
            // Simple validation (in a real app, this would be server-side)
            if (currentPassword.length < 1) {
                document.getElementById('current_password_error').textContent = 'Current password is required';
                document.getElementById('current_password_error').classList.remove('hidden');
                return;
            }
            
            if (newPassword.length < 8) {
                document.getElementById('password').focus();
                return;
            }
            
            if (newPassword !== confirmPassword) {
                document.getElementById('password_confirmation_error').textContent = 'Passwords do not match';
                document.getElementById('password_confirmation_error').classList.remove('hidden');
                return;
            }
            
            // Show success modal (in a real app, this would be after server validation)
            // const successModal = new Flowbite.Modal(document.getElementById('successModal'));
            // successModal.show();
            
            // // Reset form (in a real app, this would happen after successful server response)
            // this.reset();
            // document.getElementById('password-strength').className = 'password-strength strength-0 rounded-full';
            // document.getElementById('strength-text').textContent = '';
        });
    </script>
</body>
</html>