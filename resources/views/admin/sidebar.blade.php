<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                Creative Tim
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item menu-items">

                <a href="{{route('redirect')}}" class="nav-link">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
                    <p>Category</p>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic1">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item  {{Request::is('add_category')?'active':''}}"> <a class="nav-link" href="{{route('addcategory')}}">Add Category</a></li>
                        <li class="nav-item  {{Request::is('show_category')?'active':''}}"> <a class="nav-link" href="{{route('showcategory')}}">Show Category</a></li>
                    </ul>
                  </div>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
                    <p>Product</p>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic2">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item  {{Request::is('add_product')?'active':''}}"> <a class="nav-link" href="{{route('addproduct')}}">Add Product</a></li>
                        <li class="nav-item  {{Request::is('show_product')?'active':''}}"> <a class="nav-link" href="{{route('showproduct')}}">Show Product</a></li>
                    </ul>
                  </div>
            </li>







        </ul>
    </div>
</div>
