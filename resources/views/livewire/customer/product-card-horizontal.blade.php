<div> 
    <div class="row my-3 border ">
        <div class="col-md-4 col-4">
            <div>
                <a href="{{ route('product_detail', $product->slug) }}">
                    <img class="" src="{{ $product->getCoverImage() }}" alt="{{ $product->name }}">
                </a>
            </div>
        </div>
        <div class="col-md-5 col-5 mt-4">
            <h6>{{ $product->sku }}</h6>
            <h6 class="mb-4"><a href="{{ route('product_detail', $product->slug) }}">{{ $product->name }}</a>
            </h6>
            <span class="text-secondary">In Pack: {{ $product->productdetail->pack }}</span>
            <br>
            <span class="text-secondary">Brand: {{ $product->brand->name }}</span>
        </div>
        <div class="col-md-3 col-3 text-right my-auto ">
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
                    <div class=" mt-2 " >
                        <a  class="btn btn-sm add_wishlist mb-1 " wire:click="addToFav"><i
                            class="{{ $userFavorited == 0 ? 'far' : 'fas' }} fa-heart text-danger"></i> Add to Favorites</a>
                        @if ($product->calcStock() > 0)
                            <button wire:click="addToCart" class="btn btn-sm py-2 btn-dark  rounded-0 "><i
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
