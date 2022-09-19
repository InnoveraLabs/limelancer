<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = ['id'];

    //Permission belongs to perticular module.
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    //Permission belongs to many roles like admin, seller, buyer.
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
