@extends('customer.layouts.master')
@section('title','Order Completed - Markket')

@section('content')

@include('customer.component.breadcrumb' , ['title' => 'Order Completed'])


<!-- START MAIN CONTENT -->
<div class="main_content">

 
<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center order_complete">
                	<i class="fas fa-check-circle"></i>
                    <div class="">
                  	<h3>Your order is completed!</h3>
                    </div>
                  	<p>Thank you for your order! Your order is being processed. You will receive an email confirmation when your order is completed.</p>
                    <a href="{{route('products')}}" class="btn btn-fill-out">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

</div>
<!-- END MAIN CONTENT -->   
@endsection
