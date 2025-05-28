<!DOCTYPE html>
<html>
<head>
    <title>Celebrate Recovery Registration Confirmation</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        /* Base styles that work in most email clients */
        .main-bg {
            background-color: #f9fafb;
        }
        @media (prefers-color-scheme: dark) {
            .main-bg {
                background-color: #1a1a1a !important;
            }
            .email-container {
                background-color: #2d2d2d !important;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3) !important;
            }
            .header-bg {
                background: linear-gradient(to right, #c2410c, #9a3412) !important;
            }
            .content-text {
                color: #e5e7eb !important;
            }
            .card-bg {
                background-color: #3a3a3a !important;
                border-color: #4a4a4a !important;
            }
            .detail-label {
                color: #d1d5db !important;
            }
            .detail-value {
                color: #ffffff !important;
            }
            .footer-text {
                color: #9ca3af !important;
            }
            .footer-link {
                color: #f97316 !important;
            }
        }
    </style>
</head>
<body class="main-bg" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; margin: 0; padding: 0;">
    <!-- Email Container -->
    <div class="email-container" style="max-width: 672px; margin: 32px auto; background-color: #ffffff; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);">
        <!-- Header with Orange Gradient -->
        <div class="header-bg" style="background: linear-gradient(to right, #f97316, #ea580c); padding: 32px 24px; text-align: center;">
            <h1 style="font-size: 30px; font-weight: 700; color: #ffffff; margin: 0;">Celebrate Recovery</h1>
            <p style="color: #fed7aa; margin-top: 8px; margin-bottom: 0;">Registration Confirmation</p>
        </div>
        
        <!-- Content Area -->
        <div style="padding: 32px; padding-left: 20px; padding-right: 20px;">
            <!-- Greeting -->
            <div style="margin-bottom: 32px;">
                <h2 class="content-text" style="font-size: 24px; font-weight: 600; color: #1f2937; margin: 0;">Hello {{ $user['name'] }},</h2>
                <p class="content-text" style="color: #4b5563; margin-top: 8px; margin-bottom: 0;">Thank you for registering for our event! We're excited to have you join us.</p>
            </div>
            
            <!-- Registration Details Card -->
            <div class="card-bg" style="border: 1px solid #ffedd5; border-radius: 8px; background-color: #fff7ed; padding: 24px; margin-bottom: 32px;">
                <h3 style="font-size: 18px; font-weight: 600; color: #9a3412; margin-bottom: 16px; display: flex; align-items: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px; margin-right: 8px;" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    Your Registration Details
                </h3>
                
                <!-- Registration Details - Each on its own line -->
                <div style="display: flex; flex-direction: column; gap: 16px;">
                    <div>
                        <div class="detail-label" style="color: #4b5563; font-weight: 500; margin-bottom: 4px;">Full Name</div>
                        <div class="detail-value" style="color: #111827; font-size: 16px;">{{ $user['name'] }}</div>
                    </div>
                    
                    <div>
                        <div class="detail-label" style="color: #4b5563; font-weight: 500; margin-bottom: 4px;">Email</div>
                        <div class="detail-value" style="color: #111827; font-size: 16px;">{{ $user['email'] }}</div>
                    </div>
                    
                    <div>
                        <div class="detail-label" style="color: #4b5563; font-weight: 500; margin-bottom: 4px;">Phone</div>
                        <div class="detail-value" style="color: #111827; font-size: 16px;">{{ $user['phone'] }}</div>
                    </div>
                    
                    <div>
                        <div class="detail-label" style="color: #4b5563; font-weight: 500; margin-bottom: 4px;">Registration Number</div>
                        <div class="detail-value" style="color: #111827; font-size: 16px;">{{ $user['uuid'] }}</div>
                    </div>
                    
                    <div>
                        <div class="detail-label" style="color: #4b5563; font-weight: 500; margin-bottom: 4px;">Registration Date</div>
                        <div class="detail-value" style="color: #111827; font-size: 16px;">{{ now()->format('F j, Y') }}</div>
                    </div>
                </div>
            </div>
            
            <!-- Next Steps -->
            <div style="margin-bottom: 32px;">
                <h3 class="content-text" style="font-size: 18px; font-weight: 600; color: #1f2937; margin-bottom: 12px;">What's Next?</h3>
                <div style="display: flex; align-items: flex-start; margin-bottom: 16px;">
                    <div style="background-color: #ffedd5; border-radius: 9999px; padding: 8px; margin-right: 12px; flex-shrink: 0;">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px; color: #ea580c;" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="content-text" style="color: #4b5563; margin: 0;">You'll receive event details and updates as we get closer to the date.</p>
                </div>
                <div style="display: flex; align-items: flex-start;">
                    <div style="background-color: #ffedd5; border-radius: 9999px; padding: 8px; margin-right: 12px; flex-shrink: 0;">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px; color: #ea580c;" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="content-text" style="color: #4b5563; margin: 0;">Save the date: <span style="font-weight: 500;">August 13-15, 2025</span></p>
                </div>
            </div>
            
            <!-- CTA Button -->
            <div style="text-align: center; margin-bottom: 32px;">
                <a href="{{ config('app.url') }}" style="display: inline-block; background-color: #ea580c; color: #ffffff; font-weight: 700; padding: 12px 24px; border-radius: 8px; text-decoration: none; transition: background-color 0.2s;">
                    Visit Our Website
                </a>
            </div>
            
            <!-- Footer -->
            <div style="border-top: 1px solid #e5e7eb; padding-top: 24px; text-align: center;">
                <p class="footer-text" style="font-size: 14px; color: #6b7280; margin: 0;">© {{ date('Y') }} Celebrate Recovery. All rights reserved.</p>
                <p class="footer-text" style="font-size: 14px; color: #6b7280; margin-top: 4px; margin-bottom: 0;">Finding freedom through Christ's healing power</p>
                <div style="margin-top: 16px;">
                    <a href="#" class="footer-link" style="color: #ea580c; font-size: 14px; margin-left: 8px; margin-right: 8px; text-decoration: none;">Privacy Policy</a>
                    <a href="#" class="footer-link" style="color: #ea580c; font-size: 14px; margin-left: 8px; margin-right: 8px; text-decoration: none;">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>