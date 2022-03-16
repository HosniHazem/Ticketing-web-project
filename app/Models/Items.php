<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
    public function sub_category() //*
    {
        return $this->belongsTo('App\SubCategory');
    }
}
