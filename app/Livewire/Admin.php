<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\TicketBooking;
use App\Models\Customer;
use App\Models\Customers;

class Admin extends Component
{
    public $isAuthenticated = false;
    public $pin = '';
    public $view = 'dashboard';

    // Ticket Redemption
    public $redemptionCode = '';

    // Ticket Type Form
    public $ticketType = [
        'name' => '',
        'description' => '',
        'price' => 0,
        'available_quantity' => 0,
        'sale_starts_at' => '',
        'sale_ends_at' => ''
    ];

    protected $rules = [
        'pin' => 'required|string',
        'ticketType.name' => 'required|string',
        'ticketType.price' => 'required|numeric',
        'ticketType.available_quantity' => 'required|integer',
    ];

    public function mount()
    {
        $this->isAuthenticated = session('admin_authenticated', false);
    }

    public function authenticate()
    {
        if ($this->pin === '0298') {
            $this->isAuthenticated = true;
            session(['admin_authenticated' => true]);
            $this->reset('pin');
        } else {
            $this->dispatch('error', 'Invalid PIN');
        }
    }

    public function logout()
    {
        $this->isAuthenticated = false;
        session()->forget('admin_authenticated');
    }

    public function redeemTicket()
    {
        $ticket = Ticket::where('redemption_code', $this->redemptionCode)
            ->where('status', 'active')
            ->where('is_used', false)
            ->first();

        if ($ticket) {
            $ticket->update([
                'is_used' => true,
                'used_at' => now(),
            ]);
            $this->dispatch('success', 'Ticket redeemed successfully');
        } else {
            $this->dispatch('error', 'Invalid or already used ticket');
        }
        $this->reset('redemptionCode');
    }

    public function createTicketType()
    {
       // $this->validate();

        TicketType::create([
            'name' => $this->ticketType['name'],
            'description' => $this->ticketType['description'],
            'price' => $this->ticketType['price'],
            'available_quantity' => $this->ticketType['available_quantity'],
            'sale_starts_at' => $this->ticketType['sale_starts_at'],
            'sale_ends_at' => $this->ticketType['sale_ends_at'],
        ]);

        $this->reset('ticketType');
        $this->dispatch('success', 'Ticket type created successfully');
    }

    public function switchView($view)
    {
        $this->view = $view;
    }

    public function getStatsProperty()
    {
        return [
            'total_tickets' => Ticket::count(),
            'used_tickets' => Ticket::where('is_used', true)->count(),
            'pending_bookings' => TicketBooking::where('status', 'pending')->count(),
            'total_customers' => Customers::count(),
        ];
    }

    public function getTicketTypesProperty()
    {
        return TicketType::latest()->get();
    }

    public function getPendingBookingsProperty()
    {
        return TicketBooking::with(['customer', 'ticket'])
            ->where('status', 'pending')
            ->latest()
            ->get();
    }

    public function getRecentTicketsProperty()
    {
        return Ticket::with(['customer'])
            ->latest()
            ->take(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.admin', [
            'stats' => $this->stats,
            'ticketTypes' => $this->ticketTypes,
            'pendingBookings' => $this->pendingBookings,
            'recentTickets' => $this->recentTickets,
        ]);
    }
}
