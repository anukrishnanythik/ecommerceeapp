<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">

          @foreach($product as $row)
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{route('productdetails',encrypt($row->product_id))}}" class="option1">
                    Product details
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="{{asset('storage/image/'.$row->image)}}"  alt="Food image">
                </div>
                <div class="detail-box">
                   <h5>
                    {{$row->title}}
                   </h5>
                   <h6>
                      ${{$row->price}}
                   </h6>
                </div>
             </div>
          </div>
          @endforeach


          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p12.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Women's Dress
                   </h5>
                   <h6>
                      $65
                   </h6>
                </div>
             </div>
          </div>
        </div>
        <div class="btn-box">
           <a href="">
           View All products
           </a>
        </div>
     </div>
  </section>
