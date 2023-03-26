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
                    <li class="breadcrumb-item active">Category</li>
                    <li class="breadcrumb-item active text-info" aria-current="page">Add category</li>
                  </ol>
                </nav>
              </div>

      <div class="card-body">
        <form class="forms-sample " action="{{route('uploadcategory')}}" method="post" enctype="multipart/form-data">
         @csrf
            <div class="form-group fw-bold">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value={{old('title')}}>
             @error('title')
                  <p class="text-danger">{{$message}}</p>
             @enderror
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" value={{old('slug')}}>
        @error('slug')
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
        <div class="col-6 mb-3">
                <label for="status">Status</label>
                <input type="checkbox" name="status" value="on" {{ old('status') == 'on' ? 'checked' : '' }}>
        </div>

        <div class="col-6">
                <label for="popular">popular</label>
                <input type="checkbox" name="popular" value="on" {{ old('popular') == 'on' ? 'checked' : '' }}>
        </div>
</div>
      <div class="form-group ">
          <label for="image">File upload</label>
            <input type="file" class="form-control" name="image" value={{old('image')}}>
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
