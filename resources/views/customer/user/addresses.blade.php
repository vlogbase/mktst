@extends('customer.layouts.master')
@section('title','Addresses - SavoyFoods')
@section('css')
    <style>
        .card-input-element {
            display: none;
        }

        .card-input {
            margin: 10px;
            padding: 00px;
        }

        .card-input:hover {
            cursor: pointer;
        }

        .card-input-element:checked + .card-input {
            box-shadow: 0 0 1px 1px #2ecc71;
        }
    </style>
@endsection
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Addresses</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                    <li class="breadcrumb-item active">Addresses</li>
                </ol>
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
                  
                    <div class="tab-pane fade active show" id="address" role="tabpanel" aria-labelledby="address-tab">
                    	@livewire('customer.user.address-list-form')
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
