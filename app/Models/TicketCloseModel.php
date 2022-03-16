<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketCloseModel extends Model
{
    use HasFactory;
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
