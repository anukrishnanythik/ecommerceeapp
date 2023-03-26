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
                    <li class="breadcrumb-item active">Product</li>
                    <li class="breadcrumb-item active text-info" aria-current="page">Add product</li>
                  </ol>
                </nav>
              </div>

      <div class="card-body">
        <form class="forms-sample " action="{{route('uploadproduct')}}" method="post" enctype="multipart/form-data">
         @csrf

<div class="row">
    <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="name" class="form-control" name="name" value={{old('name')}}>
             @error('name')
                  <p class="text-danger">{{$message}}</p>
             @enderror
            </div>

    <div class="form-group col-md-6">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" value={{old('slug')}}>
        @error('slug')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
</div>

    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" name="category" >
           <option value="">..select category..</option>
            @foreach($category as $row)
           <option  value="{{$row->category_id}}">{{$row->title}}</option>
           @endforeach
   </select>
      @error('category')
      <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="3" class="form-control" name="description">{{old('description')}}</textarea>
        @error('description')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

<div class="row">
    <div class="form-group col-md-6">
        <label for="originalprice">Originalprice</label>
        <input type="number" class="form-control" name="originalprice" value={{old('originalprice')}}>
@error('originalprice')
    <p class="text-danger">{{$message}}</p>
@enderror
</div>
<div class="form-group col-md-6">
    <label for="sellingprice">Sellingprice</label>
    <input type="number" class="form-control" name="sellingprice" value={{old('sellingprice')}}>
@error('sellingprice')
<p class="text-danger">{{$message}}</p>
@enderror
</div>
</div>

<div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="number" class="form-control" name="quantity" value={{old('quantity')}}>
@error('quantity')
<p class="text-danger">{{$message}}</p>
@enderror
</div>

        <div class="form-group ">
                <label for="status">Status</label>
                <input type="checkbox" name="status" value="on" {{ old('status') == 'on' ? 'checked' : '' }}>
        </div>

      <div class="form-group ">
          <label>File upload</label>
            <input type="file" class="form-control" name="image" value={{old('image')}}>
        @error('image')
             <p class="text-danger">{{$message}}</p>
         @enderror
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-info btn-fill pull-right">Add Product</button>
        </div>
     </form>

      </div>
    </div>
  </div>



@endsection
