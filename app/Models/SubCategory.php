<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded = [];

    public function parent(){

        return $this->hasOne( Category::class, 'id', 'category_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

}
