@extends('admin.layouts.templates.panel')
@section('title', 'Product')
@section('sub-title', 'List')
@section('css')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

@endsection
@section('content')
    <!--begin::Toolbar-->
    <div class="d-flex flex-wrap flex-stack mb-6">
        <!--begin::Heading-->
        <h3 class="fw-bolder my-2">Product Table</h3>
        <!--end::Heading-->
        <!--begin::Actions-->
        <div class="d-flex flex-wrap my-2">
            <a href="{{ route('admin.products.bulk_upload') }}" class="btn btn-secondary btn-sm ">Bulk Upload</a>
            <a href="{{ route('admin.products.bulk_export') }}" class="btn btn-dark btn-sm ">Bulk Export</a>
            <a href="{{ route('admin.products.add') }}" class="btn btn-primary btn-sm">Add Product</a>
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
                                <th>Image</th>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Stock</th>
                                <th>Categories</th>
                                <th>Created Date</th>
                                <th>Status</th>
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

        $(function() {

            table.DataTable({
                stateSave: true,
                stateSaveCallback: function(settings, data) {
                    localStorage.setItem('DataTables_' + settings.sInstance, JSON.stringify(data))
                },
                stateLoadCallback: function(settings) {
                    return JSON.parse(localStorage.getItem('DataTables_' + settings.sInstance))
                },
                order: [
                    [0, "desc"]
                ],
                columnDefs: [{
                    "className": "align-middle",
                    "targets": "_all"
                }],
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.products.list') }}",
                columns: [
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'sku',
                        name: 'sku'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'brand',
                        name: 'brand'
                    },
                    {
                        data: 'unit_price',
                        name: 'unit_price'
                    },
                    {
                        data: 'discount',
                        name: 'discount'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'categories',
                        name: 'categories'
                    },
                    {
                        data: 'created_at_visual',
                        name: 'created_at'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
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
