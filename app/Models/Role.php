<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];

    // permission  belongs to roles
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    // Role belongs to many users.
    public function users()
    {
        return $this->hasMany(User::class);
    }

}
