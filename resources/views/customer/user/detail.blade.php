@extends('customer.layouts.master')
@section('title','Detail - Markket')

@section('content')

@include('customer.component.breadcrumb' , ['title' => 'Detail'])



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
                  
                    <div class="tab-pane fade active show" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
						<div class="card">
                        	<div class="card-header">
                                <h3>Account Details</h3>
                            </div>
                            <div class="card-body">
                                @livewire('customer.user.detail-form')
                            </div>
                        </div>
                        <div class="card mt-5">
                                @livewire('customer.user.address-form')
                        </div>
                        <div class="card mt-5">
                                @livewire('customer.user.delete-user')
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
