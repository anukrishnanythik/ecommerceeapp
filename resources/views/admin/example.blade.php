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
                        <th  class="fs-6 text-center">Price</th>
                        <th  class="fs-6 text-center">Orderdetails</th>
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

                        <td>
                                 <p id="order" > Details</p>

                            </td>

                        <div class="row justify-content-center">
                            <div class="col-6 float-center" id="orderdetails"  style="display:none">
<p>fgfbfb</p>
</div>
</div>

                        <td></td>
                        <td></td>
                        <td></td>
                        {{-- <td  class="fs-6">{{$row->title}}</td>
                        <td  class="fs-6">{{$row->description}}</td>
                        <td  class="fs-6"><img  height='100' width='100' src="{{asset('storage/image/'.$row->image)}}"  alt="Category image"></td> --}}


                        <td><button type="button" class="btn btn-warning"><a href="{{route('paymentstatus',encrypt($row->order_id))}}"
                            class="text-decoration-none  fs-6" >Paymentstatus</a></button>  </td>
                            <td>   <button type="button" class="btn btn-danger"><a href="{{route('deliverystatus',encrypt($row->order_id))}}"
                                class="text-decoration-none  fs-6" >Deliverystatus</a></button>
                          </td>
                      </tr>
                 @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>




<button type="button" id="order"  class="btn btn-lg bg-primary text-light"> Order Now</button>

<div class="row justify-content-center">
    <div class="col-6 float-center" id="orderdetails"  style="display:none">


                <div class="form-group">
                    <label  class="fs-6" for="name">Name:</label>
                    <input type="text" class=" bg-light text-dark form-control " id="name" name="name" >
                  </div>

                </div>
            </div>



            <div class="row">

                <button type="button" id="order"  class="btn btn-lg bg-primary text-light"> Order Now</button>

                <div class="row justify-content-center">
                    <div class="col-6 float-center" id="orderdetails"  style="display:none">

                                                    <label  class="fs-6" for="name">Address:</label>
                                                    <p>fdvdfg</p>
                                                    <h1>fsfgdfgg</h1>


                                                        <div class="text-center">
                                                            <p id="close" class="btn btn-lg bg-danger mt-3 text-light"> close</p>
                                                         </div>

        </div>

    </div>

@endsection
