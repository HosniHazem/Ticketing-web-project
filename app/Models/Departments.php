<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;
    protected  $table='departments';
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
