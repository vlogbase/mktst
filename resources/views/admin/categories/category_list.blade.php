@extends('admin.layouts.templates.panel')
@section('title','Category')
@section('sub-title','List')
@section('css')
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

@endsection
@section('content')
<!--begin::Toolbar-->
<div class="d-flex flex-wrap flex-stack mb-6">
    <!--begin::Heading-->
    <h3 class="fw-bolder my-2">Category Table</h3>
    <!--end::Heading-->
    <!--begin::Actions-->
    <div class="d-flex flex-wrap my-2">
        <a href="{{route('admin.categories.tree')}}" class="btn btn-light-primary btn-sm" >Tree View</a>
        <a href="{{route('admin.categories.add')}}" class="btn btn-primary btn-sm" >Add Category</a>
    </div>
    <!--end::Actions-->
</div>
<!--end::Toolbar-->

<div class="card mt-5 mb-5 " id="kt_profile_details_view">

    <!--begin::Card body-->
    <div class="card-body ">
        <!--begin::Row-->
        <div class="row mb-7">
            <!--begin::Label-->
            <div class="col-lg-12">
                <table class="table table-hover  yajra-datatable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Products</th>
            <th>Childs</th>
            <th>Parent</th>
            <th>Created Date</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</div>
<!--end::Col-->
</div>
<!--end::Row-->

</div>
<!--end::Card body-->
</div>
<!--end::details View-->
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('.yajra-datatable');

    $(function () {
      
      table.DataTable({
        order: [[ 0, "desc" ]], 
            columnDefs: [
            {"className": "align-middle", "targets": "_all"}
            ],
          processing: true,
          serverSide: true,
          ajax: "{{ route('admin.categories.list') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'image', name: 'image',orderable: false, searchable: false},
              {data: 'name', name: 'name'},
              {data: 'products', name: 'products'},
              {data: 'child', name: 'child'},
              {data: 'parent', name: 'parent'},
              {data: 'created_at_visual', name: 'created_at'},
              {
                  data: 'action', 
                  name: 'action', 
                  orderable: false, 
                  searchable: false
              },
          ]
      });
      
    });


</script>
@endsection