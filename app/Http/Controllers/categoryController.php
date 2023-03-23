<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class categoryController extends Controller
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
        return view('admin.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'image' => 'required'
          ]);

          $title=$request->title;
          $slug=$request->slug;
          $description=$request->description;
          $status=$request->status == TRUE ? '1':'0';
          $popular=$request->popular  == TRUE ?'1':'0';

          if(request()->hasFile('image'))
          {
              $extension =request('image')->extension();
              $file ='user_pic'. time().'.'.$extension;
              request('image') ->storeAs('image',$file);
              $image =$file;
          }

          Category::create([
              'title' =>  $title,
              'slug'=> $slug,
              'description'=> $description,
              'status'=> $status,
              'popular'=> $popular,
              'image' =>  $image,

          ]);
          return redirect()->route('showcategory')->with('status',"Category added succesfully!!");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category= Category::all();
        return view('admin.showcategory',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category= Category::findOrFail(decrypt($id));
        return view('admin.editcategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category= Category::findOrFail(decrypt($id));
        $request->validate([
          'title' => 'required',
          'slug' => 'required',
          'description' => 'required',
        ]);

        $title=$request->title;
        $slug=$request->slug;
        $description=$request->description;
        $status=$request->status ==TRUE ?'1':'0';
        $popular=$request->popular  ==TRUE ?'1':'0';

        if(request()->hasFile('image'))
        {
            unlink('storage/image/'.$category->image);
            $extension =request('image')->extension();
            $file ='user_pic'. time().'.'.$extension;
            request('image') ->storeAs('image',$file);
            $image =$file;


        }else{
            $image =$category->image;
        }

        $category->update([
            'title' =>  $title,
            'slug'=> $slug,
            'description'=> $description,
            'status'=> $status,
            'popular'=> $popular,
            'image' =>  $image
        ]);
        return redirect()->route('showcategory')->with('status',"Category updated succesfully!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category= Category::findOrFail(decrypt($id));
        if(file_exists('storage/image/'.$category->image))
        {
            unlink('storage/image/'.$category->image);
        }
            $category->delete();
           return redirect()->route('showcategory')->with('message',"category deleted succesfully!!");
     }
 }

