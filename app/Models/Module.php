<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //Module has many permission like create, read, edit, delete
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
