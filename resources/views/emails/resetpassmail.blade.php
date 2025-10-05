<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
            line-height: 1.6;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
            padding: 40px 20px;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .content {
            padding: 40px 30px;
            text-align: center;
        }

        .icon {
            width: 60px;
            height: 60px;
            background: #4f46e5;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon svg {
            width: 30px;
            height: 30px;
            fill: white;
        }

        .content h2 {
            font-size: 24px;
            color: #1f2937;
            margin-bottom: 16px;
        }

        .content p {
            color: #6b7280;
            font-size: 16px;
            margin-bottom: 20px;
            max-width: 450px;
            margin-left: auto;
            margin-right: auto;
        }

        .reset-button {
            display: inline-block;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white !important;
            text-decoration: none;
            padding: 16px 32px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            margin: 20px 0;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
            border: none;
            cursor: pointer;
        }

        .reset-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
            background: linear-gradient(135deg, #4338ca 0%, #6d28d9 100%);
        }

        .security-note {
            background-color: #f8fafc;
            border-left: 4px solid #4f46e5;
            padding: 20px;
            margin: 30px 0;
            text-align: left;
        }

        .security-note h3 {
            color: #1f2937;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .security-note p {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 0;
        }

        .footer {
            background-color: #f8fafc;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }

        .footer p {
            color: #9ca3af;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .footer a {
            color: #4f46e5;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .expiry-info {
            background-color: #fef3c7;
            border: 1px solid #f59e0b;
            border-radius: 6px;
            padding: 15px;
            margin: 20px 0;
        }

        .expiry-info p {
            color: #92400e;
            font-size: 14px;
            margin: 0;
        }

        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            
            .content {
                padding: 30px 20px;
            }
            
            .header {
                padding: 30px 20px;
            }
            
            .header h1 {
                font-size: 24px;
            }
            
            .reset-button {
                padding: 14px 24px;
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>Password Reset Request</h1>
            <p>We received a request to reset your password</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="icon">
                <img src="{{url('/img/lock.svg')}}" alt="">
            </div>
            
            <h2>Reset Your Password</h2>
            <p>Click the button below to reset your password. This link will expire in 24 hours for security reasons.</p>
            
            <a href="{{ url(route('reset-password', ['token' => $token])) }}" class="reset-button" style="color: white;">Reset Password</a>
            
            <div class="expiry-info">
                <p><strong>⏰ This link expires in 24 hours</strong></p>
            </div>

            <div class="security-note">
                <h3>🔒 Security Notice</h3>
                <p>If you didn't request this password reset, you can safely ignore this email. Your password will remain unchanged.</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>This is an automated message, please do not reply to this email.</p>
            <p>If you're having trouble with the button above, copy and paste the URL below into your web browser:</p>
            <p><a href="{{ url(route('reset-password', ['token' => $token])) }}">{{ url(route('reset-password', ['token' => $token])) }}</a></p>
            <p style="margin-top: 20px;">© {{ date('Y') }} {{ $site_name }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>