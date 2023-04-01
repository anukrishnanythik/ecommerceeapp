






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
                                    <th  class="fs-6">Quantity</th>
                                    <th  class="fs-5">Price</th>
                                    <th  class="fs-5">Payment status</th>
                                    <th  class="fs-5">Delivery status</th>
                                    <th  class="fs-6">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $row )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->orderproduct->name}}</td>
                                    <td  class="fs-6"><img  height='100' width='100' src="{{asset('storage/image/'.$row->orderproduct->image)}}"  alt="Product image"></td>
                                    <td>{{$row->quantity}}</td>
                                    <td>20</td>
                                    <td>{{$row->paymentstatus}}</td>
                                    <td>{{$row->deliverystatus}}</td>

                                    @if ($row->deliverystatus=='Processing')
                                         <td><button type="button" class="btn bg-danger"><a onclick="confirmation(event)" href="{{route('cancelorder',encrypt($row->order_id))}}"
                                         class="text-decoration-none  fs-6 text-light" >Cancel Order</a></button></td>
                                    @elseif($row->deliverystatus=='Order cancelled')
                                        <td>Cancelled</td>
                                        @else
                                        <td>Delivered</td>
                                    @endif

                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.row -->
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


























