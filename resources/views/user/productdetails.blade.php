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
         <div class="container">
         <div class="row">
      <div class="col-3">
    </div>


            <div class="col-sm-6 col-md-4 col-lg-4">
               <div class="box">

                     <img src="{{asset('storage/image/'.$product->image)}}"  height='400' width='400' class="mt-4" alt="Food image">
                  </div>
                  <div class="detail-box text-center mt-5">
                     <h2 class="fw-bold">
                      {{$product->name}}
                     </h2>
                     @if ($product->sellingprice!=null)
                     <h6>
                       Original price:  ${{$product->originalprice}}
                       </h6>
                   <h6 class="text-danger">
                    Selling price: ${{$product->sellingprice}}
                      </h6>

                       @else
                       <h6 class="text-danger">
                        Original price:  ${{$product->originalprice}}
                       </h6>
                   @endif
                  </div>
                  <br>
                  <h6>Product Category : {{$product->productcategory->title}}</h6>
                  <h6>Product Details : {{$product->description}}</h6>
                  <h6>Available Quantity: {{$product->quantity}}</h6>
                  <div class="col-6">

                  <form class="forms-sample " action="" method="post">
                    {{-- {{route('addcart')}} --}}
                    @csrf
            <input type="number" class="" name="quantity" min="1" value="1">

            <button type="submit" class="btn btn-info btn-fill ">Add to cart</button>
            </div>
        </div>

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
   </body>
</html>
