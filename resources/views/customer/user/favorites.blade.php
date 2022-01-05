@extends('customer.layouts.master')
@section('title','Favorites - SavoyFoods')
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
            		<h1>Favorites</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                    <li class="breadcrumb-item active">Favorites</li>
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
            <div class="col-lg-3 col-md-4">
                @include('customer.user.user_menu')
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">
                  
                    <div class="tab-pane fade active show" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
						<div class="table-responsive shop_cart_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">SKU</th>
                                        <th class="product-subtotal">Price</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="/customer_assets/images/product_img1.jpg" alt="product1"></a></td>
                                        <td class="product-name" data-title="Product"><a href="#">Blue Dress For Woman</a></td>
                                        <td class="product-price" data-title="Price">1323213</td>
                                          <td class="product-subtotal" data-title="Total">$90.00</td>
                                        <td class="product-remove" data-title="Remove"><a href="#"><i class="ti-close"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="/customer_assets/images/product_img2.jpg" alt="product2"></a></td>
                                        <td class="product-name" data-title="Product"><a href="#">Lether Gray Tuxedo</a></td>
                                        <td class="product-price" data-title="Price">12312312</td>
                                       
                                          <td class="product-subtotal" data-title="Total">$55.00</td>
                                        <td class="product-remove" data-title="Remove"><a href="#"><i class="ti-close"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="/customer_assets/images/product_img3.jpg" alt="product3"></a></td>
                                        <td class="product-name" data-title="Product"><a href="#">woman full sliv dress</a></td>
                                        <td class="product-price" data-title="Price">1231232131</td>
                                        
                                          <td class="product-subtotal" data-title="Total">$204.00</td>
                                        <td class="product-remove" data-title="Remove"><a href="#"><i class="ti-close"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
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
