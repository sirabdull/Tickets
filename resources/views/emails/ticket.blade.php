<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Event Ticket</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
        }
        .ticket {
            width: 600px;
            height: 250px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
            display: flex;
            margin: 0 auto;
        }
        .ticket::before {
            content: '';
            position: absolute;
            top: 0;
            left: 430px;
            width: 2px;
            height: 100%;
            background: repeating-linear-gradient(0deg, #ccc, #ccc 8px, transparent 8px, transparent 16px);
        }
        .ticket-left {
            flex: 7;
            padding: 15px;
            position: relative;
        }
        .ticket-right {
            flex: 3;
            padding: 15px;
            background: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .event-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.1;
            object-fit: cover;
            z-index: 0;
        }
        .ticket-content {
            position: relative;
            z-index: 1;
        }
        .event-title {
            font-size: 20px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .ticket-info {
            margin-bottom: 6px;
            color: #34495e;
        }
        .ticket-label {
            font-weight: bold;
            color: #7f8c8d;
            font-size: 11px;
            text-transform: uppercase;
        }
        .ticket-value {
            font-size: 13px;
            margin-top: 2px;
        }
        .qr-code {
            width: 100px;
            height: 100px;
            margin-bottom: 8px;
        }
        .redemption-code {
            font-size: 11px;
            color: #7f8c8d;
            text-align: center;
        }
        .ticket-footer {
            position: absolute;
            bottom: 15px;
            left: 15px;
            font-size: 10px;
            color: #95a5a6;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <img src="{{ public_path('images/carnival.jpg') }}" class="event-image">

        <div class="ticket-left">
            <div class="ticket-content">
                <div class="event-title">Carnival Event 2024</div>

                <div class="ticket-info">
                    <div class="ticket-label">Ticket Holder</div>
                    <div class="ticket-value">{{ $customer->name }}</div>
                </div>

                <div class="ticket-info">
                    <div class="ticket-label">Ticket Type</div>
                    <div class="ticket-value">{{ $ticket->ticket_type }}</div>
                </div>

                <div class="ticket-info">
                    <div class="ticket-label">Quantity</div>
                    <div class="ticket-value">{{ $ticket->quantity }}</div>
                </div>

                <div class="ticket-info">
                    <div class="ticket-label">Booking Reference</div>
                    <div class="ticket-value">{{ $bookingReference }}</div>
                </div>

                <div class="ticket-footer">
                    This ticket is non-transferable and must be presented at the entrance.
                </div>
            </div>
        </div>

        <div class="ticket-right">
            <img src="data:image/png;base64,{{ $qrCode }}" class="qr-code">
            <div class="redemption-code">
                {{ $ticket->redemption_code }}
            </div>
        </div>
    </div>
</body>
</html>
