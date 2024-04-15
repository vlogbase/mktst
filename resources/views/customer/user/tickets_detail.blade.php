@extends('customer.layouts.master')
@section('title', 'Ticket Detail - Markket')
@section('content')

@include('customer.component.breadcrumb' , ['title' => 'Ticket Detail'])



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
                                        <div>
                                            <h3>Ticket Detail</h3>
                                        </div>
                                        <a href="{{ route('user.tickets') }}" class="btn btn-fill-out btn-sm">Back to List</a>

                                    </div>
                                    <div class="card-body">
                                        <h5>{{$item->title}}</h5>
                                        <strong>Urgency:</strong> {!!$item->urgencyText() !!} <br>
                                        <strong>Status:</strong> {{$item->status}} <br>
                                        {{$item->topic}} - 
                                        {{$item->humanTime()}} <br>
                                        {{$item->description}}
                                        <div class="mt-5">
                                            @livewire('customer.ticket.ticket-message', ['ticket_id' => $item->id,'author' => 'customer'])
                                        </div>
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
