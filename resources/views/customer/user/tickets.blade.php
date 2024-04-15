@extends('customer.layouts.master')
@section('title', 'Support Tickets - Markket')
@section('content')

    @include('customer.component.breadcrumb' , ['title' => 'Support Tickets'])


    <!-- START MAIN CONTENT -->
    <div class="main_content">


        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        @include('customer.user.user_menu')
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h3>Support Tickets</h3>
                                        <a href="{{route('user.tickets_new')}}" class="btn btn-fill-out btn-sm">Add New</a>
                                    </div>
                                    <div class="card-body">
                                        @livewire('customer.ticket.ticket-list')
                                    
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

    </div>
    <!-- END MAIN CONTENT -->
@endsection
