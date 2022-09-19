<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function dashboard()
    {
        abort_if(Gate::denies('admin.dashboard'), Response::HTTP_FORBIDDEN, '403 forbidden');
        return view('admin.dashboard');
    }
	
	public function signout()
	{
		echo 'I am not ok !!!'; exit;
	}
}
