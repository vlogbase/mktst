@extends('admin.layouts.templates.panel')
@section('title', 'Newsletter')
@section('sub-title', 'List')
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
                                <th>Email</th>
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
                ajax: "{{ route('admin.contents.other.newsletter.list') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
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

        function deleteItem(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/admin/contents/other/newsletter/delete/" + id,
                type: 'DELETE',
                dataType: 'json',
                success: function(result) {
                    table.DataTable().ajax.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection
