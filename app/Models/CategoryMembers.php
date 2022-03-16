<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryMembers extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->hasOne('App\Category');
    }
}
