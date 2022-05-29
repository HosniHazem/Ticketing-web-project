<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;
class Levels extends Model
{
    use HasFactory;
    protected  $table='levels';
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
