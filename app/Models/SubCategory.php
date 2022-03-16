<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
    public function category() //*
    {
        return $this->belongsTo('App\Category');
    }
    public function items()
    {
        return $this->hasMany('App\Items');
    }
}
