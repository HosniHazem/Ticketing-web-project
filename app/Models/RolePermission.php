<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;
    protected  $table='roles_permissions';
    public function roles() //*
    {
        return $this->belongsTo('App\Roles');
    }
}
