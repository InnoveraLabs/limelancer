<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('user', 'pricing', 'descriptions', 'galleries', 'requirements')->get();
        return view('admin.gigs.index', compact('services'));
    }
}
