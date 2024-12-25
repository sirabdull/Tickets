
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Failed</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(45deg, #FF6B6B, #FF4949, #FF7676, #FF5252);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            font-family: 'Arial', sans-serif;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 40px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .failure-icon {
            font-size: 80px;
            color: #FF4949;
            margin-bottom: 20px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 36px;
        }

        p {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .button {
            display: inline-block;
            padding: 15px 30px;
            background-color: #FF4949;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #FF3333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="failure-icon">❌</div>
        <h1>Purchase Failed</h1>
        <p>We're sorry, but something went wrong with your ticket purchase. This could be due to:</p>
        <ul style="text-align: left; color: #666; margin-bottom: 30px;">
            <li>Payment processing error</li>
            <li>Network connectivity issues</li>
            <li>Insufficient funds</li>
            <li>Technical difficulties</li>
        </ul>
        <p>Please try again or contact our support team if the problem persists.</p>
        <a href="/" class="button">Return to Homepage</a>
    </div>
</body>
</html>
