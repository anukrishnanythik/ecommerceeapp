@extends('layouts.admin')

@section('contents')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
            <div class="page-header">
              <h2 class="text-center text-secondary">Welcome Admin</h2>
            </div>
    </div>
 </div>

 <div class="container-fluid py-1">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mr-5">
        <div class="card">
            <div class="text-end pt-1">
              <h4 class="text-center mb-0 text-capitalize">Total Products</h4>
              <h4 class="mb-0 text-center">{{$totalproduct}}</h4>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 ml-5 mr-5">
        <div class="card">
            <div class="text-end pt-1">
              <h4 class="text-center mb-0 text-capitalize">Total Orders</h4>
              <h4 class="mb-0 text-center" >{{$totalorder}}</h4>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 ml-5 mr-5">
        <div class="card">
            <div class="text-end pt-1">
              <h4 class="text-center mb-0 text-capitalize">Total Customers</h4>
              <h4 class="mb-0 text-center">{{$totaluser}}</h4>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mr-5">
        <div class="card">
            <div class="text-end pt-1">
              <h4 class="text-center mb-0 text-capitalize">Total Revenue</h4>
              <h4 class="mb-0 text-center">$53k</h4>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 ml-5 mr-5">
        <div class="card">
            <div class="text-end pt-1">
              <h4 class="text-center mb-0 text-capitalize">Order Delivered</h4>
              <h4 class="mb-0 text-center">{{$totaldelivered}}</h4>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 ml-5 mr-5">
        <div class="card">

            <div class="text-end pt-1">
              <h4 class="text-center mb-0 text-capitalize">Order Processing</h4>
              <h4 class="mb-0 text-center">{{$totalprocessing}}</h4>
            </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>

    </div>

  </div>
</main>


 @endsection
