<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketCloseModel extends Model
{
    use HasFactory;
    protected  $table='ticket_close_models';
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
