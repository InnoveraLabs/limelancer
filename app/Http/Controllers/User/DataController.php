<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getServiceBySubCategory($sub_c_slug)
    {
        $getServiceBysubcategory = Service::with('pricing', 'descriptions', 'requirements', 'galleries', 'subcategory', 'user')
                                                ->whereHas('subcategory', function ($query) use ($sub_c_slug) {
                                                    $query->where('sub_c_slug', $sub_c_slug);
                                                })
                                                ->where('status',1)
                                                ->get();
		// dd($getServiceBysubcategory);
        return view('gigs.service_by_subcategory', compact('getServiceBysubcategory', 'sub_c_slug'));
    }
	
	
}
