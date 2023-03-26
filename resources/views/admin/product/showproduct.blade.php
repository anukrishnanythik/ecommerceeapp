@extends('layouts.admin')
@section('contents')

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

        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th  class="fs-4 text-center">slno </th>
                        <th  class="fs-4 text-center">Name</th>
                        <th  class="fs-4 text-center">Description</th>
                        <th  class="fs-4 text-center">Quantity</th>
                        <th  class="fs-4 text-center">Category</th>
                        <th  class="fs-4 text-center">Price</th>
                        <th  class="fs-4 text-center">Discount price</th>
                        <th  class="fs-4 text-center">Image</th>
                        <th colspan="2" class="fs-6 text-center">Action</th>
                     </tr>
                </thead>
                <tbody>
                    @foreach($product as $row)
                    <tr class="fs-6 text-center">
                    <td  class="fs-6 ">{{$loop->iteration}}</td>
                    <td  class="fs-6">{{$row->name}}</td>
                    <td  class="fs-6">{{$row->description}}</td>
                    <td  class="fs-6">{{$row->quantity}}</td>
                    <td  class="fs-6">{{$row->productcategory->title}}</td>
                    <td  class="fs-6">{{$row->originalprice}}</td>
                    <td  class="fs-6">{{$row->sellingprice}}</td>
                    <td  class="fs-6"><img  height='100' width='100' src="{{asset('storage/image/'.$row->image)}}"  alt="Product image"></td>
                       <td><button type="button" class="btn btn-warning"><a href="{{route('editproduct',encrypt($row->product_id))}}"
                          class="text-decoration-none  fs-6" >Edit</a></button></td>
                       <td><button type="button" class="btn btn-danger"><a href="{{route('deleteproduct',encrypt($row->product_id))}}"
                       class="text-decoration-none  fs-6 " >Delete</a></button></td>
                   </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

@endsection
