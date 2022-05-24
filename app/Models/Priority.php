<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;

class Priority extends Model
{
    use HasFactory;
    protected  $table='priority';

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
