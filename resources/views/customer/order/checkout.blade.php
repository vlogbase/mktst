@extends('customer.layouts.master')
@section('title','Checkout - SavoyFoods')
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
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Checkout</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
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
       
        <div class="row">
        	<div class="col-md-6">
                <div class="mb-4">
                    <div class="heading_s1">
                        <h4>Shipping Details
                            <a  href="{{route('user.addresses')}}">
                                <i class="ion-edit"></i>
                                </a> 
                        </h4>
                    </div>
                    <div class="row">
        
                        <div class="col-md-6  p-2">
                          
                          <label class="">
                            <input type="radio"  name="product" class="card-input-element" />
                  
                              <div class="panel panel-default card-input ">
                                <div class="card-header">Product A</div>
                                <div class="card-body">
                                  Product specific content Product specific content Product specific content Product specific content
                                </div>
                              </div>
                  
                          </label>
                          
                        </div>
                        <div class="col-md-6  p-2">
                          
                            <label>
                              <input type="radio"  name="product" class="card-input-element" />
                    
                                <div class="panel panel-default card-input ">
                                  <div class="card-header">Product B</div>
                                  <div class="card-body">
                                    Product specific content Product specific content Product specific content Product specific content
                                  </div>
                                </div>
                    
                            </label>
                            
                          </div>
                          <div class="col-md-6  p-2">
                            <label>
                              <input type="radio" checked name="product" class="card-input-element" />
                    
                                <div class="panel panel-default card-input ">
                                  <div class="card-header">Product C</div>
                                  <div class="card-body">
                                    Product specific content Product specific content Product specific content Product specific content
                                  </div>
                                </div>
                            </label>
                          </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="heading_s1">
                        <h4>Billing Details <a href="{{route('user.detail')}}">
                            <i class="ion-edit"></i>
                            </a> </h4>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12 p-2">
                              <div class="panel panel-default card-input ">
                                <div class="card-header">Product A</div>
                                <div class="card-body">
                                  Product specific content Product specific content Product specific content Product specific content
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            	

                <div class="heading_s1">
                    <h4>Additional information</h4>
                </div>
                <div class="form-group mb-0">
                    <textarea rows="5" class="form-control" placeholder="Order notes"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>Your Orders</h4>
                    </div>
                    <div class="table-responsive order_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Blue Dress For Woman <span class="product-qty">x 2</span></td>
                                    <td>$90.00</td>
                                </tr>
                                <tr>
                                    <td>Lether Gray Tuxedo <span class="product-qty">x 1</span></td>
                                    <td>$55.00</td>
                                </tr>
                                <tr>
                                    <td>woman full sliv dress <span class="product-qty">x 3</span></td>
                                    <td>$204.00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SubTotal</th>
                                    <td class="product-subtotal">$349.00</td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>Free Shipping</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td class="product-subtotal">$349.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="heading_s1">
                            <h4>Payment</h4>
                        </div>
                        <div class="payment_option">
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" value="option3" checked="">
                                <label class="form-check-label" for="exampleRadios3">Direct Bank Transfer</label>
                                <p data-method="option3" class="payment-text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration. </p>
                            </div>
                            <div class="custome-radio">
                                <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios4" value="option4">
                                <label class="form-check-label" for="exampleRadios4">Check Payment</label>
                                <p data-method="option4" class="payment-text">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                            </div>
                            <div class="custome-radio">
                                <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios5" value="option5">
                                <label class="form-check-label" for="exampleRadios5">Paypal</label>
                                <p data-method="option5" class="payment-text">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-fill-out btn-block">Place Order</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
    
</div>
<!-- END MAIN CONTENT -->   
@endsection
