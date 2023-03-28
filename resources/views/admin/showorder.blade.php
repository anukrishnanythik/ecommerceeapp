



@extends('layouts.admin')
@section('contents')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
            <div class="page-header">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Show category</li>
                  </ol>
                </nav>
              </div>

      <div class="card-body">

        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped">
    <thead>
        <tr>
            <th  class="fs-4 text-center">slno </th>
            <th  class="fs-4 text-center">Name</th>
            <th  class="fs-4 text-center">Email</th>
            <th  class="fs-6 text-center">Phone</th>
            <th  class="fs-6 text-center">Address</th>
            <th  class="fs-6 text-center">Productname</th>
            <th  class="fs-6 text-center">Quantity</th>
            <th  class="fs-6 text-center">Price</th>
            <th  class="fs-6 text-center">Paymentstatus</th>
            <th  class="fs-6 text-center">Deliverystatus</th>
            <th colspan="2" class="fs-6 text-center">Action</th>
         </tr>
    </thead>
    <tbody>

        @foreach($order as $row )
        <tr class="fs-6 text-center ">
            <td  class="fs-6 ">{{$loop->iteration}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->ordercart->cartuser->email}}</td>
            <td>{{$row->phone}}</td>
            <td>{{$row->address}}</td>
            <td>{{$row->ordercart->cartproduct->name}}</td>
            <td>{{$row->ordercart->quantity}}</td>
            <td> @if(($row->ordercart->cartproduct->sellingprice  * $row->quantity) ==0)
                ${{$row->ordercart->cartproduct->originalprice  * $row->ordercart->quantity}}
             @else
                ${{$row->ordercart->cartproduct->sellingprice  * $row->ordercart->quantity}}
             @endif</td>
            <td>{{$row->paymentstatus}}</td>
            <td>{{$row->deliverystatus}}</td>


            <td><button type="button" class="btn btn-warning"><a href="{{route('paymentstatus',encrypt($row->order_id))}}"
                class="text-decoration-none  fs-6" >Payment</a></button>  </td>
                <td>
                    @if ($row->deliverystatus == 'deliver')
                    <button type="button" class="btn btn-danger"><a href="{{route('deliverystatus',encrypt($row->order_id))}}"
                    class="text-decoration-none  fs-6" >Delivery</a></button>
                    @else

                    <p class="mt-2">Delivered</p>
                    @endif
              </td>
          </tr>
     @endforeach
    </tbody>
</table>
</div>


    </div>

    </div>

      <!-- jQery -->


   @endsection





















