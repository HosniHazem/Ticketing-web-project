<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impacts extends Model
{
    use HasFactory;
    protected  $table='impacts';
    protected  $fillable=['name','description','Is_Active','Is_Defaults','Is_client_visible'];
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
