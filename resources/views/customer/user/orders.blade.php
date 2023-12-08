@extends('customer.layouts.master')
@section('title','Orders - Markket')

@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section page-title-mini" style="background-color:chocolate;">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-12 text-center">
                <div class="page-title">
            		<h1 style="color:white!important;">Orders</h1>
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
                  
                  	<div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Orders</h3>
                            </div>
                            <div class="card-body">
                    			@livewire('customer.user.orders-list')
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
