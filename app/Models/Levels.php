<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{
    use HasFactory;
    protected  $table='levels';
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
