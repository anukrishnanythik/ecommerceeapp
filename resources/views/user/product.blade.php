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

                        <form action="{{route('addcart',encrypt($row->product_id))}}" method="post">
                            @csrf
                    <input type="number" class="d-none" name="quantity" min="1" value="1">

                    <button  class="option1" type="submit">Add to cart</button>
                   
                </form>
                   </div>
                </div>
                <div class="img-box">
                    <img src="{{asset('storage/image/'.$row->image)}}"  alt="Product image">
                </div>
                <div class="detail-box">
                   <h5>
                    {{$row->name}}
                   </h5>



                   @if ($row->sellingprice!=null)
                   <h6 class="text-danger">
                       ${{$row->sellingprice}}
                      </h6>
                      <h6  class='text-decoration-line-through'>
                        ${{$row->originalprice}}
                       </h6>
                       @else
                       <h6 class="text-danger">
                        ${{$row->originalprice}}
                       </h6>
                   @endif

                </div>

             </div>
          </div>
          @endforeach
        <span>
          {{$product->withQueryString()->links()}}
        </span>


       </div>
       <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div>
 </section>
