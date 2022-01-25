<div>
    <form wire:submit.prevent="orderAttempt">
        @if(session()->has('payment_error'))
        <div class="row">
            <div class="col text-center">
                <div class="alert alert-danger" role="alert">
                   {{ session('payment_error') }}
                  </div>
            </div>
        </div>
        @endif
    <div class="row">
        <div class="col-md-6">
            <div class="mb-4">
                <div class="heading_s1">
                    <h4>Cart Details
                    </h4>
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
                            @foreach($items as $item)
                            <tr>
                                <td>{{$item->name}}<span class="product-qty"> x{{$item->quantity}}</span></td>
                                <td>£{{$item->price*$item->quantity}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    
                    </table>
                </div>
            </div>
            <div class="mb-4">
                <div class="heading_s1">
                    <h4>Shipping Details
                        @error('officeSelect')<span class="text-danger">{{ $message }}</span> @enderror
                        <a  href="{{route('user.addresses')}}">
                            <i class="ion-edit"></i>
                            </a> 
                    </h4>
                </div>
                <div class="row">
                    @foreach($offices as $office)
                    <div class="col-md-6  p-2">
                      <label class="">
                        <input type="radio"  value="{{$office->id}}" wire:model="officeSelect" class="card-input-element" />
              
                          <div class="panel panel-default card-input ">
                            <div class="card-header">{{$office->office_name}}</div>
                            <div class="card-body">
                                {{$office->name.' '. $office->surname}}
                                <hr>
                                {{$office->address->formatted_address}}
                                {{$office->address->country.' '.$office->address->postcode}}
                            </div>
                          </div>
                      </label>
                    </div>
                    @endforeach
                    
                      
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
                            <div class="card-header">{{$user->name}}</div>
                            <div class="card-body">
                                VAT:{{$user->vat}} <br> Registeration:{{$user->registration}} <br>
                                {{$userdetail->address->formatted_address}}
                                {{$userdetail->address->country.' '.$userdetail->address->postcode}}
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            

            <div class="heading_s1">
                <h4>Additional information</h4>
            </div>
            <div class="form-group mb-0">
                <textarea rows="5" class="form-control" wire:model="ordernote" placeholder="Order notes"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="order_review">
                <div class="heading_s1">
                    <h4>Your Order</h4>
                </div>
                <div class="table-responsive order_table">
                    <table class="table">
                        
                        <tfoot>
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
                        </tfoot>
                    </table>
                </div>
                <div class="payment_method">
                    <div class="heading_s1">
                        <h4>Payment</h4>
                        @error('payment_option')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="payment_option">
                        @foreach ($payments as $payment)
                        <div class="custome-radio">
                            <input class="form-check-input" type="radio" wire:model="payment_option" id="exampleRadios{{$payment->id}}" value="{{$payment->id}}" >
                            <label class="form-check-label" for="exampleRadios{{$payment->id}}">{{$payment->name}}</label>
                        </div>
                        @endforeach
                    </div>
                    @if($payment_option == 6)
                    <div class="mt-1">
                        <p>Your Point: {{$user->point}} - Need Point: {{$payment_need}}</p>
                    </div>
                    @endif
                </div>
                <div class="chek-form mb-4">
                    <div class="custome-checkbox">
                        <input class="form-check-input " type="checkbox" wire:model="agreement" id="agreement" value="1">
                        <label class="form-check-label @error('agreement') text-danger @enderror" for="agreement"><span>I agree to the SavoyFoods <a class="text-info" href="{{route('terms_and_conditions')}}">Terms and conditions</a> and <a class="text-info" href="{{route('terms_and_conditions')}}">Privacy policy</a>*</span></label>
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-fill-out btn-block">Place Order</button>
                @if($earn_point > 0)
                <div class="text-center">
                    <small ><strong>{{$earn_point}}</strong> Point will be earned</small>
                </div>
                @endif
            </div>
        </div>
    </div>
    </form>
</div>
