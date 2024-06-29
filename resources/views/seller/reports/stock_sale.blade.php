@extends('admin.layouts.templates.panel')
@section('title', 'Stock Sale')
@section('sub-title', 'Report')
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
                    <div class="d-flex flex-wrap m-2 align-items-center">
                        <strong>Date Filter:</strong>
                        <input type="text" class="mx-1 p-2" name="daterange" value="" />
                        <button class="btn btn-primary btn-sm mx-2 filter">Filter</button>
                    </div>

                    <table class="table table-hover  yajra-datatable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Order#</th>
                                <th>Product</th>
                                <th>SKU</th>
                                <th>Brand</th>
                                <th>Supplier</th>
                                <th>Buyer</th>
                                <th>Unit Price</th>
                                <th>Quatity</th>
                                <th>Total Price</th>
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
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('.yajra-datatable');

        $(function() {

            $('input[name="daterange"]').daterangepicker({
                startDate: moment().startOf('month'),
                endDate: moment()
            });
            //clean local storage
            //localStorage.clear();

            table.DataTable({
                stateSave: false,
                stateSaveCallback: function(settings, data) {
                    localStorage.setItem('DataTables_' + settings.sInstance, JSON.stringify(data))
                    
                },
                stateLoadCallback: function(settings) {
                    return JSON.parse(localStorage.getItem('DataTables_' + settings.sInstance))
                },
                
                order: [
                    [0, "desc"]
                ],

                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('seller.reports.stocksale') }}",

                    data: function(d) {
                        d.from_date = $('input[name="daterange"]').data('daterangepicker').startDate
                            .format('YYYY-MM-DD');
                        d.to_date = $('input[name="daterange"]').data('daterangepicker').endDate.format(
                            'YYYY-MM-DD');
                    }
                },
                dom: 'Bfrtip',
                buttons: [
                    'csv'
                ],
                columns: [
                    {
                        data: 'created_at',
                        name: 'created_at'
                    }

                    , {
                        data: 'order_number',
                        name: 'order_number'
                    }, {
                        data: 'product_name',
                        name: 'product_name'
                    }, {
                        data: 'product_sku',
                        name: 'product_sku'
                    }, {
                        data: 'brand_name',
                        name: 'brand_name'
                    }, {
                        data: 'supplier_name',
                        name: 'supplier_name'
                    }, {
                        data: 'buyer_name',
                        name: 'buyer_name'
                    }, {
                        data: 'unit_price',
                        name: 'unit_price'
                    }, {
                        data: 'quantity',
                        name: 'quantity'
                    }, {
                        data: 'total_price',
                        name: 'total_price',
                        //orderable: false,
                        //searchable: false
                    },
                ]
            });

            $(".filter").click(function() {
                table.DataTable().draw(true);
            });

        });
    </script>
@endsection
