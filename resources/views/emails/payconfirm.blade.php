<!DOCTYPE html>
<html>
<head>
    <title>Celebrate Recovery - Ticket Confirmation</title>
    <!-- Favicon (logo on browser tab) -->
    <link rel="icon" href="{{ asset('images/CRLogo.png') }}" type="image/png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        /* Base styles */
        body {
            font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
            color: #1f2937;
            line-height: 1.5;
        }
        
        /* Email container */
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
        }
        
        /* Header */
        .header {
            background: linear-gradient(135deg, #f97316, #ea580c);
            padding: 40px 20px;
            text-align: center;
            color: white;
        }
        
        .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin: 20px 0 8px 0;
            line-height: 1.2;
        }
        
        .header p {
            font-size: 16px;
            margin: 0;
            opacity: 0.9;
        }
        
        /* Logo */
        .logo {
            height: 60px;
            width: auto;
            display: block;
            margin: 0 auto;
        }
        
        /* Content */
        .content {
            padding: 30px;
        }
        
        /* Confirmation section */
        .confirmation {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .confirmation-icon {
            background-color: #ffedd5;
            border-radius: 50%;
            padding: 12px;
            margin-right: 16px;
            flex-shrink: 0;
        }
        
        .confirmation-text {
            font-size: 22px;
            font-weight: 600;
            color: #1f2937;
        }
        
        /* Event details */
        .event-details {
            background-color: #fff7ed;
            border-left: 4px solid #ea580c;
            padding: 16px;
            margin-bottom: 24px;
        }
        
        .event-details h3 {
            font-weight: 600;
            color: #9a3412;
            margin-top: 0;
            margin-bottom: 12px;
        }
        
        .event-details p {
            margin: 8px 0;
        }
        
        /* Ticket card */
        .ticket-card {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 24px;
        }
        
        .ticket-card h3 {
            text-align: center;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 20px;
            color: #1f2937;
        }
        
        .ticket-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }
        
        .ticket-label {
            color: #6b7280;
        }
        
        .ticket-value {
            font-weight: 500;
        }
        
        .ticket-total {
            border-top: 1px solid #e5e7eb;
            padding-top: 12px;
            margin-top: 16px;
            font-weight: 700;
            color: #ea580c;
        }
        
        /* Bible verse */
        .verse {
            font-style: italic;
            margin: 24px 0;
            text-align: center;
        }
        
        .verse-reference {
            color: #ea580c;
            display: block;
            margin-top: 8px;
        }
        
        /* CTA button */
        .cta-button {
            display: inline-block;
            background-color: #ea580c;
            color: white;
            font-weight: 600;
            padding: 14px 28px;
            border-radius: 6px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.2s;
        }
        
        .cta-button:hover {
            background-color: #c2410c;
        }
        
        .cta-container {
            text-align: center;
            margin: 30px 0;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            color: #6b7280;
            font-size: 14px;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 16px;
            margin: 16px 0;
        }
        
        .social-icon {
            color: #ea580c;
        }
        
        /* Dark mode */
        @media (prefers-color-scheme: dark) {
            body {
                background-color: #1a1a1a !important;
            }
            
            .email-container {
                background-color: #2d2d2d !important;
            }
            
            .content, .confirmation-text, .ticket-card h3, .ticket-value {
                color: #e5e7eb !important;
            }
            
            .event-details {
                background-color: #3a3a3a !important;
                border-color: #ea580c !important;
            }
            
            .ticket-card {
                background-color: #3a3a3a !important;
                border-color: #4a4a4a !important;
            }
            
            .ticket-label {
                color: #d1d5db !important;
            }
            
            .verse {
                color: #e5e7eb !important;
            }
        }
    </style>
</head>
<body>
    <!-- Email Container -->
    <div class="email-container">
        <!-- Header with Orange Gradient -->
        <div class="header">
            <img src="https://celebraterecovery.com/wp-content/uploads/2022/08/cr-logo-white.png" alt="Celebrate Recovery" class="logo">
            <h1>Your Ticket Confirmation</h1>
            <p>We're celebrating your healing journey!</p>
        </div>
        
        <!-- Content Area -->
        <div class="content">
            <!-- Confirmation -->
            <div class="confirmation">
                <div class="confirmation-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ea580c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                </div>
                <div class="confirmation-text">Payment Received!</div>
            </div>
            
            <!-- Greeting -->
            <p>Dear {{ $user['name'] }},</p>
            <p>Thank you for registering for <strong style="color: #ea580c;">Celebrate Recovery</strong>. Your payment has been processed successfully, and we're honored to have you join us for this transformative experience.</p>
            
            <!-- Event Details -->
            <div class="event-details">
                <h3>Event Details:</h3>
                <p><strong>Date:</strong> August 12 - 15</p>
                <p><strong>Time:</strong> 8 AM - 5 PM</p>
                <p><strong>Location:</strong> Ridgeways Baptist Church <br>Church Road<br>Nairobi, Kenya</p>
            </div>
            
            <!-- Ticket Card -->
            <div class="ticket-card">
                <h3>Your Ticket</h3>
                
                <div class="ticket-row">
                    <span class="ticket-label">Order #:</span>
                    <span class="ticket-value">{{ $user['uuid'] }}</span>
                </div>
                
                <div class="ticket-row">
                    <span class="ticket-label">Ticket Type:</span>
                    <span class="ticket-value">{{ $user['ticket_type'] }}</span>
                </div>
                
                <div class="ticket-row ticket-total">
                    <span>Total Paid:</span>
                    <span>{{ $user['price'] }}</span>
                </div>
            </div>
            
            <!-- Bible Verse -->
            <div class="verse">
                "Therefore, if anyone is in Christ, the new creation has come: The old has gone, the new is here!"
                <span class="verse-reference">— 2 Corinthians 5:17 (NIV)</span>
            </div>
            
            <!-- CTA Button -->
            <div class="cta-container">
                {{-- <a href="[AddToCalendarLink]" class="cta-button">Add to Calendar</a> --}}
                <p style="font-size: 14px; color: #6b7280; margin-top: 12px;">
                    Can't attend? <a href="" style="color: #ea580c; text-decoration: underline;">Contact us</a> for refund options.
                </p>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p>CR Kenya</p>
            <p>Church Road • +254740285959</p>
            
            <div class="social-links">
                <a href="https://www.facebook.com/profile.php?id=61575750338597" class="social-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path></svg>
                </a>
                <a href="https://www.instagram.com/cr.kenya" class="social-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"></path></svg>
                </a>
            </div>
            
            <p>"He has sent me to bind up the brokenhearted..." — Isaiah 61:1</p>
        </div>
    </div>
</body>
</html>