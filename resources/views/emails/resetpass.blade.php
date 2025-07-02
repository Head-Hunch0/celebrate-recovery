<!DOCTYPE html>
<html>
<head>
    <title>Celebrate Recovery Password Reset</title>
    <!-- Favicon (logo on browser tab) -->
    <link rel="icon" href="{{ asset('images/CRLogo.png') }}" type="image/png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        /* Base styles */
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
            color: #1f2937;
            line-height: 1.5;
        }
        
        /* Email container */
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        /* Header */
        .header {
            background: linear-gradient(135deg, #f97316, #ea580c);
            padding: 32px 24px;
            text-align: center;
            color: white;
        }
        
        .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
        }
        
        .header p {
            font-size: 16px;
            margin-top: 8px;
            margin-bottom: 0;
            opacity: 0.9;
        }
        
        /* Content */
        .content {
            padding: 32px;
        }
        
        /* Card */
        .card {
            background-color: #fff7ed;
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 32px;
            border: 1px solid #ffedd5;
        }
        
        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            color: #9a3412;
            font-weight: 600;
            font-size: 18px;
        }
        
        .card-header svg {
            margin-right: 12px;
            color: #9a3412;
        }
        
        /* Detail rows */
        .detail-row {
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid #ffedd5;
        }
        
        .detail-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        
        .detail-label {
            font-size: 14px;
            color: #6b7280;
            font-weight: 500;
            margin-bottom: 4px;
        }
        
        .detail-value {
            font-size: 16px;
            font-weight: 500;
            color: #1f2937;
        }
        
        /* CTA button */
        .cta-button {
            display: inline-block;
            background-color: #ea580c;
            color: white;
            font-weight: 600;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.2s;
        }
        
        .cta-button:hover {
            background-color: #c2410c;
        }
        
        /* Footer */
        .footer {
            border-top: 1px solid #e5e7eb;
            padding-top: 24px;
            text-align: center;
            font-size: 14px;
            color: #6b7280;
        }
        
        /* Dark mode */
        @media (prefers-color-scheme: dark) {
            body {
                background-color: #1a1a1a !important;
            }
            
            .email-container {
                background-color: #2d2d2d !important;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2) !important;
            }
            
            .content, .detail-value {
                color: #e5e7eb !important;
            }
            
            .card {
                background-color: #3a3a3a !important;
                border-color: #4a4a4a !important;
            }
            
            .detail-label {
                color: #d1d5db !important;
            }
        }
    </style>
</head>
<body>
    <!-- Email Container -->
    <div class="email-container">
        <!-- Header with Orange Gradient -->
        <div class="header">
            <h1>Celebrate Recovery</h1>
            <p>Password Reset Request</p>
        </div>
        
        <!-- Content Area -->
        <div class="content">
            <!-- Greeting -->
            <div style="margin-bottom: 32px;">
                <h2 style="font-size: 24px; font-weight: 600; margin: 0 0 8px 0;">Hello {{ $user['full_name'] ?? 'User' }},</h2>
                <p style="margin: 0;">We received a request to reset your password. Click the button below to set a new password.</p>
            </div>
            
            <!-- Reset Instructions Card -->
            <div class="card">
                <div class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                    Password Reset Instructions
                </div>
                
                <p style="margin-bottom: 20px;">This password reset link will expire in 60 minutes and can only be used once.</p>
                
                <p style="margin-bottom: 0;">If you didn't request a password reset, please ignore this email or contact support if you have questions.</p>
            </div>

            <!-- Reset CTA Button -->
            <div style="text-align: center; margin-bottom: 32px;">
                <a href="{{ $resetUrl ?? '#' }}" class="cta-button">
                    Reset Your Password
                </a>
            </div>
            
            <!-- Security Note -->
            <div style="font-size: 14px; color: #6b7280; margin-bottom: 24px; text-align: center;">
                For your security, this link expires in 60 minutes.
            </div>
            
            <!-- Footer -->
            <div class="footer">
                <p style="margin: 0;">© {{ date('Y') }} CR Kenya. All rights reserved.</p>
                <p style="margin-top: 8px; margin-bottom: 0;">Finding freedom through Christ's healing power</p>
            </div>
        </div>
    </div>

</body>
</html>