<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
    public function category_members() //*
    {
        return $this->belongsTo('App\CategoryMembers');
    }
    public function sub_category()
    {
        return $this->hasMany('App\SubCategory');
    }

}
