<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class SubCategory extends Model
{
    use HasFactory;
    protected  $table='sub_category';
    protected $with =['category'];
    public function tickets()
    {
        return $this->hasMany('App\models\Ticket');
    }
    public function category() //*
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function items()
    {
        return $this->hasMany('App\Items');
    }
}
