<!DOCTYPE html>
<html>
<head>
    <title>Celebrate Recovery Registration Confirmation</title>
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
        
        /* Next steps */
        .next-steps {
            margin-bottom: 32px;
        }
        
        .next-steps h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 16px;
        }
        
        .step {
            display: flex;
            align-items: flex-start;
            margin-bottom: 16px;
        }
        
        .step-icon {
            background-color: #ffedd5;
            border-radius: 50%;
            padding: 8px;
            margin-right: 12px;
            flex-shrink: 0;
            display: inline-flex;
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
        
        /* Financial assistance */
        .financial-assistance {
            background-color: #f3f4f6;
            padding: 16px;
            border-radius: 6px;
            font-size: 14px;
            margin: 24px 0;
            text-align: center;
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
            
            .financial-assistance {
                background-color: #3a3a3a !important;
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
            <p>Registration Confirmation</p>
        </div>
        
        <!-- Content Area -->
        <div class="content">
            <!-- Greeting -->
            <div style="margin-bottom: 32px;">
                <h2 style="font-size: 24px; font-weight: 600; margin: 0 0 8px 0;">Hello {{ $user['name'] }},</h2>
                <p style="margin: 0;">Thank you for registering for our event! We're excited to have you join us.</p>
            </div>
            
            <!-- Registration Details Card -->
            <div class="card">
                <div class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    Your Registration Details
                </div>
                
                <!-- Registration Details - Each on its own line -->
                <div>
                    <div class="detail-row">
                        <div class="detail-label">Full Name</div>
                        <div class="detail-value">{{ $user['name'] }}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">Email</div>
                        <div class="detail-value">{{ $user['email'] }}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">Phone</div>
                        <div class="detail-value">{{ $user['phone'] }}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">Registration Number</div>
                        <div class="detail-value">{{ $user['uuid'] }}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">Registration Date</div>
                        <div class="detail-value">{{ now()->format('F j, Y') }}</div>
                    </div>
                </div>
            </div>
            
            <!-- Next Steps -->
            <div class="next-steps">
                <h3>What's Next?</h3>
                
                <div class="step">
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p>You'll receive event details and updates as we get closer to the date.</p>
                </div>
                
                <div class="step">
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p>Save the date: <strong>August 13-15, 2025</strong></p>
                </div>
            </div>
            
            <!-- Financial Assistance -->
            <div class="financial-assistance">
                If you need financial assistance to purchase your ticket, please email 
                <a href="mailto:CRConference2025@ridgewaysbaptistchurch.org" style="color: #4B5563; text-decoration: underline;">
                    CRConference2025@ridgewaysbaptistchurch.org
                </a>
                or call +254740285959.
            </div>
            
            <!-- CTA Button -->
            <div style="text-align: center; margin-bottom: 32px;">
                <a href="{{ config('app.url') }}" class="cta-button">
                    Visit Our Website
                </a>
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