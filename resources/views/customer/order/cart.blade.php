@extends('customer.layouts.master')
@section('title','Cart - Markket')
@section('content')

@include('customer.component.breadcrumb' , ['title' => 'Cart'])


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
