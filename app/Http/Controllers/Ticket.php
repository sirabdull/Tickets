<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Customer;
use App\Models\Ticket as TicketModel;
use App\Models\TicketBooking;
use App\Mail\TicketConfirmation;
use App\Models\Customers;
use stdClass;
class Ticket extends Controller
{
    public static function handle(stdClass $metaData)  {
        // Create ticket record
        $ticket = new TicketModel();
        $ticket->customer_id = $metaData->customer_id;
        $ticket->ticket_type = $metaData->ticket_type;
        $ticket->price = $metaData->ticket_price;
        $ticket->quantity = $metaData->quantity;
        $ticket->redemption_code =  rand(1000, 9999);
        $ticket->status = 'active';
        $ticket->save();

        // Update booking status
        TicketBooking::where('booking_reference', $metaData->booking_reference)
            ->update([
                'status' => 'confirmed',
                'confirmed_at' => now()
            ]);

        // Get customer details
        $customer = Customers::find($metaData->customer_id);

        // Generate QR code
        $qrCode = base64_encode(QrCode::format('png')
            ->size(200)
            ->generate($ticket->redemption_code));

        // Generate PDF ticket
        $pdf = PDF::loadView('emails.ticket', [
            'ticket' => $ticket,
            'customer' => $customer,
            'qrCode' => $qrCode,
            'bookingReference' => $metaData->booking_reference
        ])->setPaper([0, 0, 283.465, 567.00], 'landscape'); // 100mm x 200mm in points

        // Send email with ticket

        defer( function () use ($pdf, $customer, $ticket, $qrCode) {
            Mail::send('emails.ticket-confirmation',
            [
                'ticket' => $ticket,
                'customer' => $customer,
                'qrCode' => $qrCode
            ],
            function($message) use ($customer, $pdf) {
                $message->to($customer->email)
                        ->subject('Your Event Ticket Confirmation')
                        ->attachData($pdf->output(), 'event-ticket.pdf');
            }
        );

        });


    }
}
