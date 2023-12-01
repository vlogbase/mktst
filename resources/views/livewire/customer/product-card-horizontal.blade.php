<div> 
    <div class="row align-items-center my-3 border ">
        <div class="col-md-2">
            <h6>{{ $product->sku }}</h6>
        </div>  

        <div class="col-md-2">
            
                <a href="{{ route('product_detail', $product->slug) }}">
                    <img class="lazy" style="height:150px;" data-src="{{ $product->getCoverImage() }}" alt="{{ $product->name }}">
                </a>
     
        </div>
        <div class="col-md-2 text-left">
            <span class="text-secondary"><img style="width: 24px;" src="/upload/other/box-icon.png" alt=""> In Pack<br>
                <strong>{{ $product->productdetail->pack }}</strong></span>
        </div>  
        <div class="col-md-3 ">
            <h6 class="mb-2"><a href="{{ route('product_detail', $product->slug) }}">{{ $product->name }}</a>
            </h6>
            <span class="text-secondary mb-4">Brand: {{ $product->brand->name }}</span>
            @if ($product->discount > 0)
            <div class="mt-3">
                <span class="pulse px-3 py-3 text-dark items-center" style="background-color:rgb(255, 251, 0);">
                    @php
                        $discount = $product->discount;
                        $price = $product->unit_price;
                        $discounted_price = intval(100 - ($product->showPrice() * 100 / $product->unit_price))  ;
                    @endphp
                    <strong style="font-size: 25px;">{{$discounted_price}}% </strong>
                    <span>DISCOUNT</span>
                </span>
            </div>
            @endif
        </div>
        <div class="col-md-3 text-right py-5" style="background-color: aliceblue">
            @auth
                <div class="align-items-center text-center">
                    <div class="product_price">
                        <span style="font-size: 25px;" class="price">£{{ $product->showPrice() }}</span>
                        @if ($product->discount > 0)
                            <del>£{{ $product->unit_price }}</del>
                        @endif
                    </div>
                    <div>
                        @if ($product->calcStock() >= 10)
                            <span class="text-success mb-2">In Stock</span>
                        @elseif($product->calcStock() < 10 && $product->calcStock() > 0)
                            <span class="text-dark mb-2">Last {{ $product->calcStock() }} Item</span>
                        @else
                            <span class="text-danger mb-2">Out of Stock</span>
                        @endif
                    </div>
                    <div class=" " >
                        <a  class="btn btn-sm add_wishlist mb-1 " wire:click="addToFav"><i
                            class="{{ $userFavorited == 0 ? 'far' : 'fas' }} fa-heart text-danger"></i> Add to Favorites</a>
                        @if ($product->calcStock() > 0)
                            <button wire:click="addToCart" class="btn btn-md py-3 btn-dark  rounded-0 "><i
                                    class="icon-basket-loaded"></i> Add to Cart</button>
                        @else
                            <a class="btn btn-sm btn-light  rounded-0  align-left" href="{{ route('contact_us') }}">Contact
                                Us</a>
                        @endif
                    </div>
                </div>
            @endauth
            @guest
                Please <a href="login">Register or Login</a> to see price and stock.
            @endguest
        </div>
    </div>
</div>

<style>
    .pulse {
  animation: pulse-animation 1s infinite;
}

@keyframes pulse-animation {
  0% {
    box-shadow: 0 0 0 0px rgba(255, 251, 0, 1);
  }
  100% {
    box-shadow: 0 0 0 10px rgba(255, 251, 0, 0.2);
  }
}

</style>