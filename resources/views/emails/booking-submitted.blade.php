<!DOCTYPE html>
<html>
<head>
    <title>New Booking Submitted</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #000;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background: #f9f9f9;
        }
        .details {
            margin: 20px 0;
            padding: 15px;
            background: #fff;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Booking Submitted</h1>
        </div>

        <div class="content">
            <p>Hello,</p>

            <p>A new booking has been submitted with the following details:</p>

            <div class="details">
                <p><strong>Name:</strong> {{ $booking->name }}</p>
                <p><strong>Email:</strong> {{ $booking->email }}</p>
                <p><strong>Phone:</strong> {{ $booking->phone }}</p>
                <p><strong>Date:</strong> {{ $booking->date }}</p>
                <p><strong>Time:</strong> {{ $booking->time }}</p>
                <p><strong>Duration:</strong> {{ $booking->duration }}</p>
                <p><strong>Location:</strong> {{ $booking->location }}</p>
                <p><strong>Message:</strong></p>
                <p>{{ $booking->message }}</p>
            </div>

            <p>Please review this booking and take appropriate action.</p>
        </div>

        <div class="footer">
            <p>This is an automated message. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>
