






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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th  class="fs-6">Name </th>
                                    <th  class="fs-3">Image</th>
                                    <th  class="fs-6">Price</th>
                                    <th  class="fs-6">Quantity</th>
                                    <th  class="fs-6">Subtotal</th>
                                    <th  class="fs-6">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data2 as $row)
                                <tr>
                                    <td>{{$row->cartproduct->name }}</td>
                                    <td>{{$row->cartproduct->name }}</td>
                                    <td>{{$row->cartproduct->sellingprice }}</td>
                                    <td>{{$row->quantity}}</td>
                                  
                                    <td>444</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="shopping-cart-btn">
                                            <span class="">
                                                <a href="#" class="btn btn-upper btn-primary outer-left-xs">Continue
                                                    Shopping</a>
                                                <a href="#"
                                                    class="btn btn-upper btn-primary pull-right outer-right-xs">Update
                                                    shopping cart</a>
                                            </span>
                                        </div><!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
                            </tfoot>
                            <tbody id="cartPage">
                            </tbody>
                        </table>
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

      @if(session('status'))
<script>
    swal("{{session('status')}}");
</script>
@endif
   </body>
</html>


























