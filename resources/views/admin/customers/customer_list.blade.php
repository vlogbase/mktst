@extends('admin.layouts.templates.panel')
@section('title','Customer')
@section('sub-title','List')
@section('css')
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

@endsection
@section('content')
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
            <th>Verified</th>
            <th>Company</th>
            <th>Type</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Postcode</th>
            <th>Purchased</th>
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
          processing: true,
          serverSide: true,
          ajax: "{{ route('admin.customers.list') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'verified', name: 'verified'},
              {data: 'name', name: 'name'},
              {data: 'type', name: 'type'},
              {data: 'email', name: 'email'},
              {data: 'phone', name: 'phone'},
              {data: 'postcode', name: 'postcode'},
              {data: 'price', name: 'price'},
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
