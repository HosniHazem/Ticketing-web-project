<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;

class Priority extends Model
{
    protected $table = 'priority' ;
    protected $fillable = [
        'name',
     


    ];
    use HasFactory;

    public function ticket()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
