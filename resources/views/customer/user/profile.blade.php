@extends('customer.layouts.master')
@section('title','Profile - Markket')
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
                  	<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Hi, {{$user->name}}</h3>
                            </div>
                            <div class="card-body">
                    			<div class="row">
                                    <div class="col-md-2 mx-auto mt-2 mb-2 col-6 border rounded-pill p-1 text-center">
                                            <p><strong class="fs-3 fw-bold">{{$user->userorders->count()}}</strong><br>Total Order</p>
                                    </div>
                                    <div class="col-md-2 mx-auto mt-2 mb-2 col-6 border rounded-pill p-1 text-center">
                                        <p><strong class="fs-3 fw-bold">{{$user->userfavorites->count()}}</strong><br>Total Favorites</p>
                                </div>
                                <div class="col-md-3 mx-auto mt-2 mb-2 col-6 border rounded-pill p-1 text-center">
                                    <p><strong class="fs-3 fw-bold">{{$user->point}}</strong><br>Total Point</p>
                            </div>
                            <div class="col-md-3 mx-auto mt-2 mb-2 col-6 border rounded-pill p-1 text-center">
                                <p>
                                    @if($user->userorders->count() > 0)
                                    <strong class="fs-3 fw-bold">{{\Carbon\Carbon::parse($user->userorders->max('created_at'))->diffForHumans()}}</strong>
                                    @else
                                    <strong>-</strong>
                                    @endif
                                    <br>Last Order
                                </p>
                        </div>
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
