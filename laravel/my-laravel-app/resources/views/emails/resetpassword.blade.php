<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }
        .email-header {
            font-size: 24px;
            font-weight: bold;
            color: #333333;
            text-align: center;
            margin-bottom: 20px;
        }
        .email-content {
            font-size: 16px;
            line-height: 1.6;
            color: #555555;
        }
        .email-content a {
            color: #ffffff;
            background-color: #007bff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
        }
        .email-footer {
            font-size: 14px;
            color: #999999;
            text-align: center;
            margin-top: 20px;
        }
        .email-footer strong {
            color: #333333;
        }
    </style> -->
</head>

<body>
    <div class="email-container">
        <div class="email-header">Reset Your Password</div>
        <div class="email-content">
            <p>Hello,</p>
            <p>You requested a password reset for <strong>{{ $appName }}</strong>.</p>
            <p>Click the link below to reset your password:</p>
            <p><a href="{{ $resetUrl }}">Reset Password</a></p>
            <p>If you did not request this, please ignore this email.</p>
        </div>
        <div class="email-footer">
            <p>Thanks,<br><strong>{{ $appName }}</strong> Team</p>
        </div>
    </div>
</body>

</html>




<!-- Hello,

You requested a password reset for {{ $appName }}.

Click the link below to reset your password:

{{ $resetUrl }}

If you did not request this, please ignore this email.

Thanks,
{{ $appName }} Team -->