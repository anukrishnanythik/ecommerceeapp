<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;


class homeController extends Controller
{
    public function index(){
        $product= Product::all();
        $category= Category::all();
        return view('user.home',compact('category','product'));

       }

    public function redirect()
    {

      if(Auth::id())
     {
      if(Auth::user()->role=='admin')
      {

        return view('admin.home');
      }
      else{
     $category= Category::all();
     $product= Product::all();

     return view('user.home',compact('category','product'));
      }
    }
      else{
        return redirect()->back();
      }
}
}

