<!DOCTYPE html>

<html lang="en">

<head>
   <base href ="/public">
   @include('admin.css')
</head>

<body>
    <div class="wrapper">
       @include('admin.sidebar')
        <div class="main-panel">
            <!-- Navbar -->
            @include('admin.navbar')
            <!-- End Navbar -->

            <div class="content">
               @yield('contents')

           </div>


        </div>
    </div>


@include('admin.script')
@if(session('status'))
<script>
    swal("{{session('status')}}");
</script>
@endif
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
</body>


</html>
