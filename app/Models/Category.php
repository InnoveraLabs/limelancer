<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{

    protected $guarded = [];

    public static function boot() {
	    parent::boot();

	    static::creating(function ($question) {
	        $question->slug = Str::slug($question->name);
	    });
	}

    public function children()
    {
        return $this->hasMany(SubCategory::class);
    }
}
