






<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href ="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
    @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
      @include('user.header')

         <!-- end header section -->



 <div class="body-content">
    <div class="container">
        <div class="my-wishlist-page">
            <div class="row">
                <div class="col-md-12 shopping-cart-table">
                    <div class="table-responsive">
                        <table class="table ">
                            <thead  class="thead-dark">
                                <tr>
                                    <th  class="fs-6">Sl no </th>
                                    <th  class="fs-6">Name </th>
                                    <th  class="fs-3">Image</th>
                                    <th  class="fs-6">Price</th>
                                    <th  class="fs-6">Quantity</th>
                                    <th  class="fs-6">Subtotal</th>
                                    <th  class="fs-6">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->cartproduct->name }}</td>
                    <td  class="fs-6"><img  height='100' width='100' src="{{asset('storage/image/'.$row->cartproduct->image)}}"  alt="Product image"></td>

                                    <td>
                                        @if($row->cartproduct->sellingprice==null)
                                             {{$row->cartproduct->originalprice }}
                                        @else
                                            ${{$row->cartproduct->sellingprice}}
                                        @endif
                                    </td>
                                    <td>{{$row->quantity}}</td>
                                    <td>
                                        @if(($row->cartproduct->sellingprice  * $row->quantity) ==0)
                                           ${{$row->cartproduct->originalprice  * $row->quantity}}
                                        @else
                                           ${{$row->cartproduct->sellingprice  * $row->quantity}}
                                        @endif
                                    </td>

                                     @php $grandtotal +=
                                            $row->cartproduct->originalprice  * $row->quantity
                                     @endphp

                                    <td><button type="button" class="btn bg-danger"><a onclick="confirmation(event)" href="{{route('deletecartorder',encrypt($row->cart_id))}}"
                                    class="text-decoration-none  fs-6 text-light" >Remove</a></button></td>

                                </tr>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>


                        <div class="col-4  float-right " >
                            <span class="justify-content-center  mt-3  " >
                                <h2 class=" bg-warning  fw-bolder pt-2 pb-2 ">&nbsp &nbsp  &nbsp Total price:${{$grandtotal}}</h2>

                            </span>

                        </div>
                        <br>
                        <br>

                        <button type="button" id="order"  class="btn  bg-primary text-light"> Order Now</button>

                        <div class="row justify-content-center">
                            <div class="col-6 float-center" id="orderdetails"  style="display:none">
                            <form action="  {{route('userdetails')}}" method="post" >
                                @csrf
                                        <div class="form-group">
                                            <label  class="fs-6" for="name">Name:</label>
                                            <input type="text" class=" bg-light text-dark form-control " id="name" name="name"  value= {{$user->name}}>
                                          </div>

                                          @error('name')
                                          <p class="text-danger">{{$message}}</p>
                                                @enderror

                                                <div class="form-group">
                                                    <label  class="fs-6" for="name">Phone:</label>
                                                    <input type="text" class=" bg-light text-dark form-control " id="phone" name="phone" value={{old('phone')}}>
                                                  </div>
                                                  @error('phone')
                                                  <p class="text-danger">{{$message}}</p>
                                                        @enderror

                                                        <div class="form-group">
                                                            <label  class="fs-6" for="name">Address:</label>
                                                            <input type="text" class=" bg-light text-dark form-control " id="address" name="address" value={{old('address')}}>
                                                          </div>
                                                          @error('address')
                                                          <p class="text-danger">{{$message}}</p>
                                                                @enderror

                                                                <div class="text-center">
                                                                    <button type="submit" id="confirm" class="btn btn-lg bg-success text-light"> Order Confirm</button>
                                                                    <p id="close" class="btn btn-lg bg-danger mt-3 text-light"> close</p>
                                                                 </div>
                            </form>
                    </div>
                    <br>
                        <div class="col-md-12 ">

                <div class="text-center justify-content-center" id="proceed"  >
                    <h2>Proceed to Order</h2>
                    <div>
                    <button class="btn mr-4 btn-danger"><a  href="{{route('cashorder')}}"
                        class="text-decoration-none  text-light">Cash On Delivery</a> </button>
                        <button class="btn mr-4 btn-danger"><a  href="{{route('payorder',$grandtotal)}}"
                            class="text-decoration-none  text-light">Pay Using Card</a> </button>
                    </div>
                </div>
                </div>
            </div>
            </div><!-- /.row -->
        </div>
    </div>
</div>


            </div>

      <!-- footer start -->
      @include('user.footer')

      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


      <script type="text/javascript">
       $(document).ready(function() {
      $("#order").click(function(){
          $("#orderdetails").show();
   });
      $("#close").click(function(){
          $("#orderdetails").hide();
   });

       });
  </script>

<script>
    function confirmation(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');
      console.log(urlToRedirect);
      swal({
          title: "Are you sure to cancel this product",
          text: "You will not be able to revert this!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willCancel) => {
          if (willCancel) {
              window.location.href = urlToRedirect;
          }
      });
  }
</script>
   </body>
</html>


























