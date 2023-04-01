<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;


class homeController extends Controller
{
    public function index(){

      if(Auth::id())
      {  return redirect()->route('redirect');
    }
      else{
        $product= Product::paginate(6);
        $category= Category::all();
        return view('user.home',compact('category','product'));

       }
    }

    public function redirect()
    {

      if(Auth::id())
     {
      if(Auth::user()->role=='admin')
      {
        $totalproduct= Product::all()->count();
        $totalorder= Order::all()->count();
        $totaluser= User::all()->count();
        $order= Order::all();
        $totaldelivered=Order::where('deliverystatus','delivered')->get()->count();
        $totalprocessing=Order::where('deliverystatus','Processing')->get()->count();



        return view('admin.home',compact('totalproduct','totalorder','totaluser','totaldelivered','totalprocessing'));
      }
      else{
     $category= Category::all();
     $product= Product::paginate(6);
     return view('user.home',compact('category','product'));
      }
    }
      else{
        return redirect()->back();
      }
}

public function productsearch(Request $request)
{
    $searchtext=$request->search;
    $product= Product::where('name','LIKE','%'.$searchtext.'%')->paginate(2);

    return view('user.home',compact('product'));
}

}


