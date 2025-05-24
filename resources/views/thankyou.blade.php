<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Sponsoring - Celebrate Recovery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'cr-orange': '#F97316',
                        'cr-orange-light': '#FDBA74',
                        'cr-orange-dark': '#C2410C',
                        'cr-blue': '#1E40AF',
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
        h1, h2, h3, h4 {
            font-family: 'Merriweather', serif;
        }
        .thank-you-hero {
            background: linear-gradient(rgba(249, 115, 22, 0.9), rgba(194, 65, 12, 0.9)), url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
            background-size: cover;
        }
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f0f;
            opacity: 0.7;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Confetti Animation -->
    <div id="confetti-container" class="fixed inset-0 overflow-hidden pointer-events-none z-10"></div>

    <!-- Hero Section -->
    <section class="thank-you-hero text-white py-20 md:py-32 relative overflow-hidden">
        <div class="container mx-auto px-4 text-center relative z-20">
            <div class="inline-block bg-white text-cr-orange-dark px-6 py-2 rounded-full text-lg font-bold mb-6 shadow-lg animate-bounce">
                <i class="fas fa-hands-holding-heart mr-2"></i>Thank You!
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Your Sponsorship Changes Lives</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                Because of your generosity, someone will experience Christ's healing power at the Celebrate Recovery Conference
            </p>
            <div class="scripture-box bg-white/20 backdrop-blur-sm p-6 rounded-lg inline-block max-w-2xl">
                <p class="text-lg md:text-xl italic">
                    "Whoever is kind to the poor lends to the Lord, and he will reward them for what they have done."
                </p>
                <p class="text-right mt-2 font-semibold">Proverbs 19:17</p>
            </div>
        </div>
    </section>

    <!-- Thank You Content -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <i class="fas fa-heart text-cr-orange text-6xl mb-6"></i>
                <h2 class="text-3xl font-bold text-cr-orange-dark mb-6">Your Gift Makes a Difference</h2>
                <div class="w-20 h-1 bg-cr-orange mx-auto mb-8"></div>
                <p class="text-lg text-gray-700 mb-8">
                    Thank you for partnering with us to bring hope and healing to those struggling with hurts, hang-ups, and habits. 
                    Your sponsorship provides full conference access, meals, and materials for someone who otherwise couldn't attend.
                </p>
                
                <div class="bg-orange-50 p-6 rounded-xl border-l-4 border-cr-orange mb-8 text-left">
                    <h3 class="font-bold text-lg text-cr-orange-dark mb-3">What Happens Next:</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <div class="bg-cr-orange text-white p-1 rounded-full mr-3 mt-1">
                                <i class="fas fa-check text-xs"></i>
                            </div>
                            <span>You'll receive a confirmation email with your sponsorship details</span>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-cr-orange text-white p-1 rounded-full mr-3 mt-1">
                                <i class="fas fa-check text-xs"></i>
                            </div>
                            <span>We'll match your sponsorship with attendees in need</span>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-cr-orange text-white p-1 rounded-full mr-3 mt-1">
                                <i class="fas fa-check text-xs"></i>
                            </div>
                            <span>After the conference, you'll receive a thank you note from your sponsored attendee</span>
                        </li>
                    </ul>
                </div>
                
                <p class="text-gray-600 mb-8">
                    <i class="fas fa-praying-hands text-cr-orange mr-2"></i>
                    We've added your prayer commitments to our prayer team's list. The individuals you sponsor will be covered in prayer throughout the conference.
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#" class="bg-cr-orange text-white px-6 py-3 rounded-lg font-bold hover:bg-cr-orange-dark transition shadow-md">
                        <i class="fas fa-share-alt mr-2"></i> Share Your Generosity
                    </a>
                    <a href="#" class="bg-white text-cr-orange-dark px-6 py-3 rounded-lg font-bold border border-cr-orange hover:bg-orange-50 transition shadow-md">
                        <i class="fas fa-calendar-check mr-2"></i> View Conference Details
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Visualization -->
    <section class="py-16 bg-orange-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-cr-orange-dark mb-2">Your Sponsorship Impact</h2>
            <p class="text-gray-600 mb-12">Here's what your generosity provides:</p>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-cr-orange">
                    <div class="text-5xl text-cr-orange-dark mb-4">
                        <i class="fas fa-ticket"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Full Conference Access</h3>
                    <p class="text-gray-600">Your sponsored attendee will participate in all workshops, worship sessions, and activities</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-cr-orange">
                    <div class="text-5xl text-cr-orange-dark mb-4">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Nutritious Meals</h3>
                    <p class="text-gray-600">All meals during the conference so they can focus on recovery</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-cr-orange">
                    <div class="text-5xl text-cr-orange-dark mb-4">
                        <i class="fas fa-book-bible"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Recovery Materials</h3>
                    <p class="text-gray-600">CR workbook, Bible, and resources to continue their journey</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Final Blessing -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 text-center">
            <div class="max-w-2xl mx-auto">
                <h2 class="text-3xl font-bold text-cr-orange-dark mb-6">May God Bless You</h2>
                <p class="text-lg text-gray-700 mb-8">
                    Your generosity reflects the heart of Christ. We pray God multiplies this seed you've sown and returns blessing to you a hundredfold.
                </p>
                <div class="scripture-box bg-orange-50 p-6 rounded-lg inline-block">
                    <p class="text-lg italic text-cr-orange-dark">
                        "Give, and it will be given to you. A good measure, pressed down, shaken together and running over, will be poured into your lap."
                    </p>
                    <p class="text-right mt-2 font-semibold text-cr-orange">Luke 6:38</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4 text-center">
            <div class="flex justify-center mb-6">
                <i class="fas fa-cross text-cr-orange-light text-3xl"></i>
            </div>
            <h3 class="text-xl font-bold text-white mb-4">Celebrate Recovery Conference</h3>
            <p class="text-gray-400 max-w-2xl mx-auto mb-6">
                A Christ-centered ministry helping people overcome hurts, hang-ups, and habits through the power of Jesus Christ.
            </p>
            <div class="flex justify-center space-x-6 mb-8">
                <a href="#" class="text-gray-400 hover:text-white transition">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition">
                    <i class="fas fa-envelope"></i>
                </a>
            </div>
            <div class="border-t border-gray-800 pt-8 text-sm text-gray-400">
                <p>© 2025 Celebrate Recovery Conference. All rights reserved.</p>
                <p class="mt-2">"Therefore, if anyone is in Christ, the new creation has come: The old has gone, the new is here!" — 2 Corinthians 5:17</p>
            </div>
        </div>
    </footer>

    <!-- Confetti Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('confetti-container');
            const colors = ['#F97316', '#FDBA74', '#C2410C', '#1E40AF', '#FFFFFF'];
            
            for (let i = 0; i < 100; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.top = -10 + 'px';
                confetti.style.transform = 'rotate(' + Math.random() * 360 + 'deg)';
                
                const animation = confetti.animate([
                    { top: -10 + 'px', left: Math.random() * 100 + 'vw', opacity: 1 },
                    { top: 100 + 'vh', left: Math.random() * 100 + 'vw', opacity: 0 }
                ], {
                    duration: 3000 + Math.random() * 5000,
                    delay: Math.random() * 2000,
                    easing: 'cubic-bezier(0.1, 0.8, 0.3, 1)'
                });
                
                container.appendChild(confetti);
                
                animation.onfinish = function() {
                    confetti.remove();
                };
            }
        });
    </script>
</body>
</html>