@extends('layouts.admin')
@section('contents')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
            <div class="page-header">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add category</li>
                  </ol>
                </nav>
              </div>

      <div class="card-body">



        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th  class="fs-6 text-center">slno </th>
                        <th  class="fs-6 text-center ">Name</th>
                        <th  class="fs-6 text-center">Description</th>
                        <th  class="fs-6 text-center">Image</th>
                        <th colspan="2"  class="text-center" >Action</th>
                     </tr>
                </thead>
                <tbody>

                    {{-- @foreach($category as $row) --}}
{{--       --}}
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

@endsection
