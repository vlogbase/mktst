@extends('customer.layouts.master')
@section('title','Cart - Markket')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section  page-title-mini" style="background-color:chocolate;">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-12 text-center">
                <div class="page-title">
            		<h1 style="color:white!important;">Cart</h1>
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
            <div class="col-12 col-md-8">
                <div class="table-responsive shop_cart_table">
                	@livewire('customer.cart.cart-page-list')
                </div>
            </div>
            <div class="col-12 col-md-4">
                @livewire('customer.cart.cart-page-price')
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            	<div class="medium_divider"></div>
            	<div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
            	<div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @livewire('customer.cart.special-product-offer')
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
    
</div>
<!-- END MAIN CONTENT -->   
@endsection
