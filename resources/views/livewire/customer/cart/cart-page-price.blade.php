<div>
    
    @if($min_cart_cost->status &&  $min_cart_cost->price > $cart_price)
    <div class="mb-2">
        <div class="alert alert-warning" role="alert">
            Minumum Cart Total must be £{{$min_cart_cost->price}}
          </div>
    </div>
    @endif
    @if($percentOfFreeDelivery > 0 && $percentOfFreeDelivery < 100)
    <div class="border p-3 mb-3">
        <h5>Free Delivery:</h5>
        <div class="progress" style="height: 24px;">
            <div  class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{$percentOfFreeDelivery}}%" aria-valuenow="{{$percentOfFreeDelivery}}" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
    </div>
    @endif
    @if($cart_price > 0)
    <div class="border p-3 mb-3">
        <form wire:submit.prevent="couponAttempt">
            @error('coupon_code')<span class="text-danger">{{ $message }}</span> @enderror
            <div class="coupon field_form input-group ">
                <input type="text" wire:model="coupon_code" class="form-control form-control-sm" placeholder="Enter Coupon Code..">
              
                <div class="input-group-append">
                    <button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>
                </div>
            </div>
        </form>
    </div>
    @endif
    @if($applied_coupon_code != NULL)
    <div class="border p-3 mb-3">
        <div class="coupon field_form input-group ">
            <table class="table">
                <tbody>
                    <tr>
                        <td><h6>{{$applied_coupon_code}}</h6></td>
                        <td ><a wire:click="removeCoupon" style="cursor: pointer;"><i class="ti-close"></i></a></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    @endif
    
    <div class="border p-3 p-md-4">
        <div class="heading_s1 mb-3">
            <h5>Cart Totals</h5>
        </div>
        <div class="table-responsive">
            <table class="table">
                @if($cart_price > 0)
                <tbody>
                    <tr>
                        <td class="cart_total_label">Cart Subtotal</td>
                        <td class="cart_total_amount ">£{{number_format($cart_price,2)}}</td>
                    </tr>
                    <tr>
                        <td class="cart_total_label">Vat Total</td>
                        <td class="cart_total_amount ">£{{number_format($vat_price,2)}}</td>
                    </tr>
                    <tr>
                        <td class="cart_total_label">Shipping</td>
                        @if($shipment_price > 0)
                        <td class="cart_total_amount ">£{{number_format($shipment_price,2)}}</td>
                        @else
                        <td class="cart_total_amount ">Free</td>
                        @endif
                    </tr>
                    @if($discount_price > 0)
                    <tr>
                        <td class="cart_total_label">Discount</td>
                        <td class="cart_total_amount text-danger ">£{{number_format($discount_price,2)}}</td>
                    </tr>
                    @endif
                    <tr>
                        <td class="cart_total_label">Total</td>
                        <td class="cart_total_amount "><strong>£{{number_format($total_price,2)}}</strong></td>
                    </tr>
                </tbody>
                @else
                <tbody>
                    <tr>
                        <td class="cart_total_label">Your cart is empty</td>
                        <td class="cart_total_amount "></td>
                    </tr>
                </tbody>
                @endif
            </table>
        </div>
        @if($cart_price > 0)
        <a href="{{route('checkout')}}" class="btn btn-block btn-success">Proceed To CheckOut</a>
        <hr>
        @endif
        
        <a href="{{route('products')}}" class="btn btn-block btn-fill-out">Add {{$cart_price > 0 ? ' more ' : ''}} products</a>

    </div>
</div>
