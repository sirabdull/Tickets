<!DOCTYPE html>
<html>
<head>
    <title>Ticket Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .confirmation-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #6366F1 0%, #4F46E5 100%);
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 30px;
        }
        .ticket-details {
            margin: 20px 0;
            padding: 20px;
            background: #f8fafc;
            border-radius: 8px;
        }
        .redemption-code {
            background: #4F46E5;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            border-radius: 8px;
            letter-spacing: 2px;
        }
        .qr-code {
            text-align: center;
            margin: 20px 0;
        }
        .qr-code img {
            max-width: 200px;
            height: auto;
        }
        .footer {
            text-align: center;
            padding: 20px;
            color: #6b7280;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <div class="header">
            <h1>Lumina Event - Ticket Confirmation</h1>
        </div>
        <div class="content">
            <p>Dear {{ $customer->name }},</p>
            <p>Thank you for your purchase. Your ticket has been confirmed and is attached to this email.</p>

            <div class="redemption-code">
                Redemption Code: {{ $ticket->redemption_code }}
            </div>

            <div class="ticket-details">
                <h3>Ticket Information:</h3>
                <p>Event: Lumina Event</p>
                <p>Ticket Type: {{ $ticket->ticket_type }}</p>
                <p>Quantity: {{ $ticket->quantity }}</p>
                <p>Price: ${{ number_format($ticket->price, 2) }}</p>
            </div>

            <div class="qr-code">
                <p>Your QR Code:</p>
                <img src="data:image/png;base64,{{ $qrCode }}" alt="Ticket QR Code">
            </div>

            <p>Please keep this email for your records. You will need to present the attached PDF ticket or QR code at the event.</p>
        </div>
        <div class="footer">
            <p>If you have any questions, please contact our support team.</p>
        </div>
    </div>
</body>
</html>
