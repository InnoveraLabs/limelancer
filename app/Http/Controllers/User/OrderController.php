<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Service;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders()
    {
        return view('orders');
    }

    public function buyerPlacedOrder(Request $request)
    {
        $buyer = Auth::user()->id;

        Order::create([
            'buyer_id'      => $buyer,
            'service_id'    => $request->input('service_id'),
            'pricing_id'    => $request->input('pricing_id')
        ]);

        return redirect()->route('user.buyers.orders');
        /*$getServiceBysubcategory = Service::with('pricing', 'descriptions', 'requirements', 'galleries', 'subcategory', 'user')->get();
        // dd($getServiceBysubcategory);
        return view('shopping_cart',compact('getServiceBysubcategory'));*/
    }

    public function getBuyersOrders()
    {
        $buyer = Auth::user()->id;
        $getBuyersOrder = Order::with('service', 'service.user', 'service.galleries', 'service.pricing')
                                                ->where('buyer_id', $buyer)->get();
        // dd($getBuyersOrder[0]->service->galleries[0]->featured_image);
        return view('buyer_orders', compact('getBuyersOrder'));
    }
}
