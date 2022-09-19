<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

	protected $guarded = [];

    public function pricings()
    {
        return $this->belongsTo(ServicePricing::class);
	}

}
