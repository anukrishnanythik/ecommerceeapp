<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function show()
    {

        $order= Order::with('ordercart')->get();
        $cart= Cart::with('cartproduct')->with('cartuser')->get();
        return view('admin.showorder',compact('order','cart'));
    }


public function payment(string $id)
{
    $order= Order::findOrFail(decrypt($id));


    return redirect()->back();
}

public function delivery(string $id)
{
    $order= Order::findOrFail(decrypt($id));
    $order['deliverystatus'] ='delivered';
    $order['paymentstatus'] ='paid';

    $order-> update();
    return redirect()->back();

}}
