<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impacts extends Model
{
    use HasFactory;
    protected  $table='impacts';
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
