<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id=Auth::id();
        $data2= Cart::with('cartproduct')->where('user_id',$user_id)->get();
        $grandtotal=0;

        return view('user.cart',compact('data2','grandtotal'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{

}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {

            if(Auth::id())
         {
        $userid=Auth::id();
       $productid= decrypt($id);
        $quantity=$request->quantity;
        Cart::create([
            'user_id' =>  $userid,
            'product_id'=> $productid,
            'quantity'=> $quantity,
        ]);
            return redirect()->route('showcart')->with('status',"Product added to cart!!");
        }
         else{
         return redirect ('login');
         }
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
