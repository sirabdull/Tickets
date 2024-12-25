<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketBooking extends Model
{
    //
    protected $table = 'ticket_bookings';
    protected $guarded = [];
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }
}
