<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //

    protected $table = 'customers';

    protected $guarded = [];


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
