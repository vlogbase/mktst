@extends('customer.layouts.master')
@section('title','Order Completed - Markket')

@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Order Completed</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Order Completed</li>
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
