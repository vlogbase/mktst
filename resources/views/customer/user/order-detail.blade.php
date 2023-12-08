@extends('customer.layouts.master')
@section('title','Order Detail - Markket')

@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section  page-title-mini" style="background-color:chocolate;">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-12 text-center">
                <div class="page-title">
            		<h1 style="color:white!important;">Order Detail</h1>
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
                        	<div class="d-flex justify-content-between items-center">
                                <div>
                                    <h3><a href="{{ url()->previous() }}"><i class="fas fa-backward"></i> </a>{{$order->ordercode}}</h3>
                                    <p>{{$order->status}} - {{\Carbon\Carbon::parse($order->created_at)->format('d M Y')}}</p>
                                </div>
                                <div class="">
                                    @livewire('customer.user.order-again-button', ['orderId' => $order->id], key($order->id))
                                </div>
                            </div>
                            <div class="card-body">
                    			<table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->orderproducts as $product)
                                        <tr>
                                            <td>{{ $product->product->sku}} | {{ $product->product->name}} <span class="product-qty">x {{ $product->quantity}}</span></td>
                                            <td>£{{ $product->sold_price * $product->quantity }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal">£{{$order->cart_price}}</td>
                                        </tr>
                                        <tr>
                                            <th>VatTotal</th>
                                            <td class="product-subtotal">£{{$order->vat_price}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Shipping</th>
                                            <td class="product-subtotal">£{{$order->shipment_price}}</td>
                                        </tr>
                                        <tr>
                                            <th>Discount</th>
                                            <td class="product-subtotal">-£{{$order->discount_price}}</td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td class="product-subtotal">£{{$order->total_price}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="col-md-12 mt-4">
                                    <h6>Shipping Information </h6>
                                    <hr>

                                    <p>Name Surname : {{$order->ordershipping->name}} {{$order->ordershipping->surname}}</p>
                                    <p>Email : {{$order->ordershipping->email}} </p>
                                    <p>Mobile & Phone : {{$order->ordershipping->mobile}} {{$order->ordershipping->phone}}</p>
                                    <p>Address : {{$order->ordershipping->address->formatted_address}} </p>
                                </div>
                                <div class="col-md-12 mt-5">
                                    <h6>Billing Information </h6>
                                    <hr>

                                    <p>Company Name : {{$order->orderbilling->company_name}} </p>
                                    <p>Vat & Registeration : {{$order->orderbilling->vat}} {{$order->orderbilling->registeration}}</p>
                                    <p>Address : {{$order->orderbilling->address->formatted_address}} </p>
                                </div>
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
