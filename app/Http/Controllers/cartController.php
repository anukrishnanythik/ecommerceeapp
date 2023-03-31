<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Address;
use RealRashid\SweetAlert\Facades\Alert;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id=Auth::id();
        $cart= Cart::with('cartproduct')->where('user_id',$user_id)->get();
        $user= User::findOrFail($user_id);
        $grandtotal=0;

        return view('user.cart',compact('cart','grandtotal','user'));


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
        Alert::toast('Product added to cart!!', 'success');
            return redirect()->route('showcart');
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
        $cart= Cart::findOrFail(decrypt($id));
        $cart->delete();
        return redirect()->back();
    }

   public function userdetails(Request $request){
    $user_id=Auth::id();

    $name=$request->name;
       $phone=$request->phone;
       $address=$request->address;

    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'address' => 'required',
    ]);

    Address::create([
        'user_id' => $user_id,
        'name' => $name,
        'address' => $address,
        'phone' => $phone

    ]);

    return redirect()->back()->with('status',"order placed succesfully!!");
    }

}
