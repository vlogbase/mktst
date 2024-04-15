@extends('customer.layouts.master')
@section('title','Favorites - Markket')

@section('content')

@include('customer.component.breadcrumb' , ['title' => 'Favorites'])



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
                    <div class="card-header">
                        <h3>Favorites</h3>
                    </div>
                    <div class="card-body">
                            @livewire('customer.user.favorite-list')
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
