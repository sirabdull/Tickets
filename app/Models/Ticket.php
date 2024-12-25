<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //

    protected $table = 'tickets';

    protected $guarded = [];

    public function ticketType()
    {
        return $this->belongsTo(TicketType::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }
}
