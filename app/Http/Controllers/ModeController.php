<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModeController extends Controller
{
    public function switch(Request $request)
    {
        if($request->session()->has('buying')){
            $request->session()->forget('buying');
            return redirect()->route('user.profile');
        } else {
            session()->put('buying', 1);
            return redirect()->route('user.services');
        }
    }
}
