<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urgency extends Model
{
    use HasFactory;
    protected  $table='urgency';
    public function tickets() //1
    {
        return $this->hasMany('App\Ticket');
    }
}
