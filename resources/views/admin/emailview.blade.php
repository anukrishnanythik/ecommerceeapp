@extends('layouts.admin')

@section('contents')
<div class="row">
<div class="col-12" >

    <div class="page-header">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb  d-flex justify-content-center">
            <li class="breadcrumb-item active">Send Email to<span class="text-primary fs-4"> {{$order->ordercart->cartuser->email}}</span> </li>
          </ol>
        </nav>
      </div>
</div>

    <div class="col-2">
    </div>
<div class="col-8 justify-center grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

    <form action="{{route('sendemail',encrypt($order->ordercart->cartuser->id))}}" method="post">
    @csrf
      <div class="form-group">
        <label for="greeting">Greeting:</label>
        <input type="greeting" class="form-control" id="greeting" name="greeting" >
      </div>
      @error('greeting')
                <p class="text-danger">{{$message}}</p>
       @enderror
      <div class="form-group">
        <label for="body">Body:</label>
        <input type="text" class="form-control" id="body"  name="body" >
      </div>
      @error('body')
      <p class="text-danger">{{$message}}</p>
            @enderror


      <div class="form-group">
        <label for="actiontext">Action text:</label>
        <input type="text" class="form-control" id="actiontext"  name="actiontext" >
      </div>
      @error('room')
      <p class="text-danger">{{$message}}</p>
            @enderror

            <div class="form-group">
           <label for="actionurl">Action url:</label>
            <input type="text" class="form-control" id="actionurl"  name="actionurl" >
            </div>
              @error('actionurl')
              <p class="text-danger">{{$message}}</p>
                    @enderror

            <div class="form-group">
           <label for="endpart">End part:</label>
            <input type="text" class="form-control" id="endpart"  name="endpart" >
            </div>
              @error('actionurl')
              <p class="text-danger">{{$message}}</p>
                    @enderror
      <br>
      <div class="form-group  d-flex justify-content-center">
               <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
    </form>
</div>
</div>
</div>

 @endsection
