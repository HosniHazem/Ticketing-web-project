<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketModels extends Model
{
    use HasFactory;
    protected  $table='ticket_models';
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
