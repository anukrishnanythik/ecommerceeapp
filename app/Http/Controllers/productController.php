<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category= Category::all();
        return view('admin.product.addproduct',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { $request->validate([
        'name' => 'required',
        'slug' => 'required',
        'description' => 'required',
        'originalprice' => 'required',
        'image' => 'required',
        'quantity' => 'required',

      ]);
      $name=$request->name;
      $slug=$request->slug;
      $category_id=$request->category;
      $description=$request->description;
      $originalprice=$request->originalprice;
      $sellingprice=$request->sellingprice;
      $quantity=$request->quantity;
      $status=$request->status ==TRUE ?'1':'0';


      if(request()->hasFile('image'))
      {
          $extension =request('image')->extension();
          $file ='user_pic'. time().'.'.$extension;
          request('image') ->storeAs('image',$file);
          $image =$file;
      }

      Product::create([
          'name' =>  $name,
          'slug'=> $slug,
          'category_id' =>  $category_id,
          'description'=> $description,
          'originalprice'=> $originalprice,
          'sellingprice'=> $sellingprice,
          'quantity'=> $quantity,
          'status'=> $status,
          'image' =>  $image,

      ]);
      return redirect()->route('showproduct')->with('status',"Product added succesfully!!");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $product= Product::with('productcategory')->get();
        return view('admin.product.showproduct',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category= Category::all();
        $product= Product::findOrFail(decrypt($id));
        return view('admin.product.editproduct',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product= Product::findOrFail(decrypt($id));
        { $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'originalprice' => 'required',
            'quantity' => 'required',

          ]);
          $name=$request->name;
          $slug=$request->slug;
          $category_id=$request->category;
          $description=$request->description;
          $originalprice=$request->originalprice;
          $sellingprice=$request->sellingprice;
          $quantity=$request->quantity;
          $status=$request->status ==TRUE ?'1':'0';


          if(request()->hasFile('image'))
          {
            File::delete('storage/image/'.$product->image);
              $extension =request('image')->extension();
              $file ='user_pic'. time().'.'.$extension;
              request('image') ->storeAs('image',$file);
              $product->update([
                'image' =>  $file,
            ]);
          }

          $product->update([
              'name' =>  $name,
              'slug'=> $slug,
              'category_id' =>  $category_id,
              'description'=> $description,
              'originalprice'=> $originalprice,
              'sellingprice'=> $sellingprice,
              'quantity'=> $quantity,
              'status'=> $status,
          ]);
          return redirect()->route('showproduct')->with('status',"Product added succesfully!!");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product= Product::findOrFail(decrypt($id));
        if(File::exists('storage/image/'.$product->image))
        {
            File::delete('storage/image/'.$product->image);
        }
            $product->delete();
           return redirect()->route('showproduct')->with('message',"Product deleted succesfully!!");
        }

        public function productdetails($id){
            $id=decrypt($id);
            $product= Product::findOrFail($id);
            return view('user.productdetails',compact('product'));
        }

}
