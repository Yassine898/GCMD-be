<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Monthly Payment Reminder</title>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #f4f6f8;
        font-family: 'Arial', sans-serif;
    }
    .container {
        max-width: 600px;
        margin: 40px auto;
        background-color: #ffffff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .header {
        background-color: #2666FC;
        color: #ffffff;
        padding: 20px;
        text-align: center;
        font-size: 24px;
        font-weight: bold;
    }
    .body {
        padding: 30px 20px;
        text-align: center;
        color: #333333;
    }
    .body p {
        font-size: 16px;
        margin-bottom: 20px;
    }
    .button {
        display: inline-block;
        padding: 12px 25px;
        background-color: #2666FC;
        color: #ffffff !important;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
        transition: background 0.3s ease;
    }
    .button:hover {
        background-color: #1a4fcc;
    }
    .footer {
        background-color: #f1f3f6;
        padding: 15px 20px;
        text-align: center;
        font-size: 12px;
        color: #888888;
    }
    @media only screen and (max-width: 600px) {
        .container {
            margin: 20px;
        }
        .header {
            font-size: 20px;
        }
        .body p {
            font-size: 14px;
        }
    }
</style>
</head>
<body>
    <div class="container">
        <div class="header">
            Monthly Payment Reminder
        </div>
        <div class="body">
            <h2>Hello, {{ $name }} 👋</h2>
            <p>We’d like to remind you to pay your monthly contribution.</p>
            <a href="http://localhost:3000/member-details/{{$id}}" class="button">Pay Now</a>
        </div>
        <div class="footer">
            © {{ date('Y') }} Your Company. All rights reserved.
        </div>
    </div>
</body>
</html>
