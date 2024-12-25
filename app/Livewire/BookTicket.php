<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\Customers;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\TicketBooking;
use Livewire\Component;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Bayscope\Paystack\Transaction\Singlecharge;
use Illuminate\Support\Facades\DB;

class BookTicket extends Component
{
    // Form fields
    public $name;
    public $email;
    public $phone;
    public $selectedTicketType;
    public $quantity = 1;

    // State management
    public $step = 1;
    public $paymentStatus = false;
    public $bookingReference;

    // Data containers
    public $ticketTypes;
    public $customer;
    public $selectedTicketTypeData;

    // Validation rules
    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'phone' => 'required',
        'quantity' => 'required|numeric|min:1',
        'selectedTicketType' => 'required'
    ];

    public function mount()
    {
        // Check if customer session exists
        if (session()->has('customer_email')) {
            $this->customer = Customers::where('email', session('customer_email'))->first();
            if ($this->customer) {
                $this->name = $this->customer->name;
                $this->email = $this->customer->email;
                $this->phone = $this->customer->phone;
                $this->step = 2;
            }
        }

        // Load available ticket types
        $this->ticketTypes = TicketType::where('is_active', 1)
            ->where('available_quantity', '>', DB::raw('sold_quantity'))
            ->whereDate('sale_starts_at', '<=', now())
            ->whereDate('sale_ends_at', '>=', now())
            ->get();
    }

    // Step 1: Customer Information
    private function handleCustomerInformation()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        $this->customer = Customers::firstOrCreate(
            ['email' => $this->email],
            [
                'name' => $this->name,
                'phone' => $this->phone
            ]
        );

        // Store customer email in session
        session(['customer_email' => $this->email]);
    }

    // Step 2: Ticket Selection and Booking
    private function handleTicketBooking()
    {
        $this->validate([
            'selectedTicketType' => 'required',
            'quantity' => 'required|numeric|min:1'
        ]);

        $this->bookingReference = 'BK-' . Str::random(10);
        $this->selectedTicketTypeData = TicketType::find($this->selectedTicketType);
        $totalPrice = $this->selectedTicketTypeData->price * $this->quantity;

        // Create booking record without ticket
        $booking = TicketBooking::create([
            'ticket_id' => $this->selectedTicketTypeData->id,
            'customer_id' => $this->customer->id,
            'booking_reference' => $this->bookingReference,
            'status' => 'pending',
            'expires_at' => now()->addMinutes(30)
        ]);

        // Initialize payment
        $this->initializePayment($totalPrice);
    }

    private function initializePayment($totalPrice)
    {
        $metadata = [
            'customer_id' => $this->customer->id,
            'ticket_type' => $this->selectedTicketTypeData->name,
            'ticket_price' => $this->selectedTicketTypeData->price,
            'quantity' => $this->quantity,
            'booking_reference' => $this->bookingReference
        ];

     (object)$tranx = (new Singlecharge(env('PAYSTACK_SECRET_KEY')))->setData([
            'email' => $this->customer->email,
            'amount' => $totalPrice * 100,
            'callback_url' => route('payment.callback'),
            'reference' => $this->bookingReference,
            'metadata' => $metadata,
            //'subaccount' =>'ACCT_jumcbavx8jq0fip',
            'subaccount' => 'ACCT_0426h2ezjcpjwzj'
        ])->initialize();
     
        return redirect($tranx->data->authorization_url);
    }

    public function nextStep()
    {
        if ($this->step === 1) {
            $this->handleCustomerInformation();
        }

        if ($this->step === 2) {
            $this->handleTicketBooking();
        }

        $this->step++;
    }

    public function processPayment()
    {
        $this->paymentStatus = true;

        if ($this->paymentStatus) {
            $this->confirmBooking();
        }
    }

    private function confirmBooking()
    {
        $booking = TicketBooking::where('booking_reference', $this->bookingReference)
            ->first();

        $booking->update([
            'status' => 'confirmed',
            'confirmed_at' => now()
        ]);

        // Clear customer session after successful booking
        session()->forget('customer_email');
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function render()
    {
        return view('livewire.book-ticket', [
            'ticketTypes' => $this->ticketTypes
        ]);
    }
}
