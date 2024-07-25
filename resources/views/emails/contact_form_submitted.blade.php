<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            margin: 30px auto;
            max-width: 600px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #1545B3;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .content h1 {
            font-size: 24px;
            color: #1545B3;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
        }
        .content .details {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        .content .details p {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>VenusItLabs</h2>
        </div>
        <div class="content">
            <h1>New Contact Form Submission</h1>
            <p>Hello,</p>
            <p>You have received a new contact form submission from your website. Here are the details:</p>
            <div class="details">
                <p><strong>Name:</strong> {{ $contactFormData['user_name'] }}</p>
                <p><strong>Email:</strong> {{ $contactFormData['user_email'] }}</p>
                <p><strong>Subject:</strong> {{ $contactFormData['subject'] }}</p>
                <p><strong>Message:</strong> <br> {{ $contactFormData['message'] }}</p>
            </div>
            <p>Please follow up with the user promptly to address their query.</p>
            <p>Best regards,</p>
            <p>VenusItLabs</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} VenusItLabs. All rights reserved.
        </div>
    </div>
</body>
</html>
