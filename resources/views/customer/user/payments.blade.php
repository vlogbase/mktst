@extends('customer.layouts.master')
@section('title', 'Profile - Markket')
@section('content')
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section page-title-mini" style="background-color:chocolate;">
        <div class="container">
            <!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <div class="page-title">
                        <h1 style="color:white!important;">Profile</h1>
                    </div>
                </div>
                
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->


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
                                        <h3>Payment Methods</h3>
                                        <a href="{{route('user.payments_add')}}" class="btn btn-primary btn-sm">Add New</a>
                                    </div>
                                    @livewire('customer.user.payment-list')
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
