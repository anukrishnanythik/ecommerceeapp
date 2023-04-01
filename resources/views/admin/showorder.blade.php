



@extends('layouts.admin')
@section('contents')

<div class="col-12">
    <div class="card">
            <div class="page-header">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Order</a></li>
                  </ol>
                </nav>
              </div>

            <div class="col-md-12 d-flex justify-content-center">
            <form action="{{route('ordersearch')}}" method="get">
            @csrf
            <div class="input-group">
                 <input style="width:500px;" type="text" class="form-control" name="search">
                 <button  type="submit" class="btn btn-primary" value="search">Search </button>
            </div>
        </form>

        </div>

      <div class="card-body">

        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped">
    <thead>
        <tr>
            <th  class="fs-5 text-center">slno </th>
            <th  class="fs-5 text-center">Name</th>
            <th  class="fs-5 text-center">Email</th>
            <th  class="fs-5 text-center">Phone</th>
            <th  class="fs-5 text-center">Address</th>
            <th  class="fs-5 text-center">Productname</th>
            <th  class="fs-5 text-center">Quantity</th>
            <th  class="fs-5 text-center">Price</th>
            <th  class="fs-5 text-center">Payment<br>status</th>
            <th  class="fs-5 text-center">Delivery<br>status</th>
            <th colspan="3" class="fs-6 text-center">Action</th>
         </tr>
    </thead>
    <tbody>

        @forelse($order as $row )
        <tr class="fs-6 text-center ">
            <td  class="fs-6 ">{{$loop->iteration}}</td>
            <td>{{$row->username}}</td>
            <td>{{$row->orderuser->email}}</td>
            <td>{{$row->phone}}</td>
            <td>{{$row->address}}</td>
            <td>{{$row->orderproduct->name}}</td>
            <td>{{$row->quantity}}</td>
            <td> @if(($row->orderproduct->sellingprice  * $row->quantity) ==0)
                ${{$row->orderproduct->originalprice  * $row->quantity}}
             @else
                ${{$row->orderproduct->sellingprice  * $row->quantity}}
             @endif</td>
            <td>{{$row->paymentstatus}}</td>
            <td>{{$row->deliverystatus}}</td>

                <td>
                    @if ($row->deliverystatus == 'Processing')
                    <button type="button" class="btn btn-danger"><a href="{{route('deliverystatus',encrypt($row->order_id))}}"
                    class="text-decoration-none  fs-6" >Delivered</a></button>
                    @else

                    <p class="mt-2">Delivered</p>
                    @endif
              </td>
              <td><button type="button" class="btn btn-warning"><a href="{{route('printpdf',encrypt($row->order_id))}}"
                class="text-decoration-none  fs-6" >Print <br>pdf</a></button>  </td>
                <td><button type="button" class="btn btn-warning"><a href="{{route('emailview',encrypt($row->order_id))}}"
                    class="text-decoration-none  fs-6" >Sent <br>email</a></button>  </td>
          </tr>
          @empty
          <div>
            <tr>
                <td class="fs-5 text-center" colspan="12" >
               <h4> No data found</h4>
            </td>
            </tr>
          </div>
     @endforelse
    </tbody>
</table>
</div>


    </div>

    </div>

      <!-- jQery -->


   @endsection





















