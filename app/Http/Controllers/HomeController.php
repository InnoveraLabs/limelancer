<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }


	 public function limelancer_pro()
    {
        return view('limelancer_pro');
    }
	 public function analytics()
    {
        return view('analytics');
    }

	 public function earnings()
    {
        return view('earnings');
    }
	 public function buyer_requests()
    {
        return view('requests');
    }
}
