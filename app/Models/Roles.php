<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected  $table='roles';
    public function role_permissions()
    {
        return $this->hasMany('App\RolePermission');
    }

}
