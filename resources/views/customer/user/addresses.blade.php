@extends('customer.layouts.master')
@section('title','Addresses - Markket')
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
<div class="breadcrumb_section page-title-mini" style="background-color:chocolate;">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-12 text-center">
                <div class="page-title">
            		<h1 style="color:white!important;">Addresses</h1>
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
