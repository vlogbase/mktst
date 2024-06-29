@extends('admin.layouts.templates.panel')
@section('title', 'Bulk API Usage')
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
                    <table class="table table-hover  yajra-datatable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Key Used</th>
                                <th>Brand Owner</th>
                                <th>Email</th>
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

                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('seller.reports.bulkapilogs') }}",

                    
                },
              
                columns: [{
                        data: 'created_at',
                        name: 'created_at'
                    }, {
                        data: 'api_key',
                        name: 'api_key'
                    }, {
                        data: 'seller_name',
                        name: 'seller_name'
                    }, {
                        data: 'seller_email',
                        name: 'seller_email'
                    },
                ]
            });

            $(".filter").click(function() {
                table.DataTable().draw(true);
            });

        });
    </script>
@endsection
