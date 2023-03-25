@extends('layouts.admin')
@section('contents')
@if (session()->has('message'))
<div class="alert alert-success">
    <button class="close" type='button' datadismiss="alert">x</button>
{{session()->get('message')}}
</div>
@endif
<br>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
            <div class="page-header">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add category</li>
                  </ol>
                </nav>
              </div>

      <div class="card-body">
        <form class="forms-sample " action="{{route('updatecategory',encrypt($category->category_id))}}" method="post" enctype="multipart/form-data">
         @csrf
            <div class="form-group fw-bold">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value={{$category->title}}>
             @error('title')
                  <p class="text-danger">{{$message}}</p>
             @enderror
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" value={{$category->slug}}>
        @error('slug')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

        <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="3" class="form-control" name="description">{{$category->description}}</textarea>
        @error('description')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
<div class="row">
        <div class="col-6 mb-3">
                <label for="status">Status</label>
                <input type="checkbox"   {{$category->status == "1" ? "checked":""}} name="status">
        </div>

        <div class="col-6">
                <label for="popular">popular</label>
                <input type="checkbox" {{$category->popular == "1" ? "checked":""}} name="popular" >
        </div>

      <div class="form-group ">
          <label>File upload</label>
            <input type="file" class="form-control" name="image" value={{asset('storage/image/'.$category->image)}}>
        @error('image')
             <p class="text-danger">{{$message}}</p>
         @enderror
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-info btn-fill pull-right">Add Category</button>
        </div>
     </form>

      </div>
    </div>
  </div>



@endsection
