@extends('customer.layouts.master')
@section('title','Checkout - Markket')
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

@include('customer.component.breadcrumb' , ['title' => 'Checkout'])

<!-- START MAIN CONTENT -->
<div class="main_content">

    
<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
       
       @livewire('customer.cart.page-checkout')
      
    </div>
</div>
<!-- END SECTION SHOP -->
    
</div>
<!-- END MAIN CONTENT -->   
@endsection
