<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Address;
use Session;
use Stripe;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function cashorder()
    {
        $user_id=Auth::id();
        $cart= Cart::where('user_id',$user_id)->get();
        foreach($cart as $data)
        {
            Order::create([
                'user_id' =>  $data->user_id,
                'product_id' =>  $data->product_id,
                'quantity' =>  $data->quantity,
                'username'  =>"Cas on delivery",
                'phone'  =>"Cas on delivery",
                'address'  =>"Cas on delivery",
                'paymentstatus' =>"Cash on delivery",
                'deliverystatus' => "Processing",

            ]);
            $id =  $data->cart_id;
            $carts= Cart::findOrFail($id);
            $carts->delete();
        }
           alert()->success('order placed succesfully!!','success');
           return redirect()->back();
        }

        public function payorder($grandtotal)
        {
           return view('user.stripe',compact('grandtotal'));
        }

        public function stripepost(Request $request,$grandtotal)
        {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\PaymentIntent::create ([
                    "amount" => $grandtotal*100,
                    "currency" =>'usd',
                    "description" => "payment done",
            ]);
            $user_id=Auth::id();
            $cart= Cart::where('user_id',$user_id)->get();
            foreach($cart as $data)
            {
                Order::create([
                    'user_id' =>  $data->user_id,
                    'product_id' =>  $data->product_id,
                    'quantity' =>  $data->quantity,
                    'username'  =>"Cas on delivery",
                    'phone'  =>"Cas on delivery",
                    'address'  =>"Cas on delivery",
                    'paymentstatus' =>"Cash on delivery",
                    'deliverystatus' => "Processing",

                ]);
                $id =  $data->cart_id;
                $carts= Cart::findOrFail($id);
                $carts->delete();
            }
            Session::flash('success', 'Payment Successfull!');
            return back();
        }


    }



