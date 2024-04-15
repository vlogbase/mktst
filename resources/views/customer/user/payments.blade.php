@extends('customer.layouts.master')
@section('title', 'Profile - Markket')
@section('content')

@include('customer.component.breadcrumb' , ['title' => 'Profile'])



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
                                        <a href="{{route('user.payments_add')}}" class="btn btn-fill-out btn-sm">Add New</a>
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
