<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Purchase Successful!</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(45deg, #FF1493, #FF4500, #9400D3, #FF69B4);
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
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .success-icon {
            font-size: 100px;
            color: #FF1493;
            margin-bottom: 30px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        h1 {
            color: #333;
            margin-bottom: 25px;
            font-size: 42px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        p {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            background: linear-gradient(45deg, #FF1493, #FF69B4);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-size: 18px;
            font-weight: bold;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-top: 20px;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 20, 147, 0.4);
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #FF1493;
            animation: confetti 5s ease-in-out infinite;
        }

        @keyframes confetti {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; }
            100% { transform: translateY(1000px) rotate(720deg); opacity: 0; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">🎉</div>
        <h1>Congratulations!</h1>
        <p>Your ticket purchase has been successfully confirmed!</p>
        <p>We've sent your tickets to your registered email address. Please check your inbox (and spam folder, just in case).</p>
        <p>Get ready for an amazing event!</p>
        <a href="/" class="btn">Back to Home</a>
    </div>
    <script>
        // Create confetti effect
        function createConfetti() {
            const confetti = document.createElement('div');
            confetti.className = 'confetti';
            confetti.style.left = Math.random() * 100 + 'vw';
            document.body.appendChild(confetti);
            setTimeout(() => confetti.remove(), 5000);
        }

        // Generate confetti continuously
        setInterval(createConfetti, 300);
    </script>
</body>
</html>
