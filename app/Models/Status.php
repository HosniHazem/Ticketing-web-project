<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

class Status extends Model
{
    use HasFactory;
    protected  $table='status';
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
