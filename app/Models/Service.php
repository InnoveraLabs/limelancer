<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function pricing()
    {
        return $this->hasMany(ServicePricing::class);
    }

    public function descriptions()
    {
        return $this->hasOne(ServiceDescription::class);
    }

    public function requirements()
    {
        return $this->hasOne(ServiceRequirement::class);
    }

    public function galleries()
    {
        return $this->hasMany(ServiceGallery::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Models\SubCategory', 'sub_category_id');
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function serviceextra()
    {
        return $this->hasMany(ServiceExtra::class);
    }
}
