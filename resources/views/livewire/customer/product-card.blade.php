<div>

    <div class="product">
        @if($product->discount > 0)
        <span class="pr_flash bg-danger">Discounted</span>
        @endif
        <div class="">
            <a href="{{route('product_detail',$product->slug)}}">
                <img src="{{$product->getCoverImage()}}" alt="{{$product->name}}">
            </a>
            {{-- <div class="product_action_box">
                <ul class="list_none pr_action_btn">
                    @if($product->calcStock() > 0) 
                    <li class="add-to-cart"><a  wire:click="addToCart"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                    @endif
                    <li><a href="#"><i class="icon-heart"></i></a></li>
                </ul>
            </div> --}}
        </div>
        <div class="product_info">
            <h6 class="product_title"><a href="{{route('product_detail',$product->slug)}}">{{$product->name}}</a></h6>
            <span class="text-secondary">SKU: {{$product->sku}}</span><br>
            <span class="text-secondary">In Pack: {{$product->per_unit}}</span>
            <div class="product_price">
                <span class="price">£{{$product->showPrice()}}</span>
                @if($product->discount > 0)
                    <del>£{{$product->unit_price}}</del>
                @endif
            </div>
            @if($product->calcStock() >= 10) 
            <span class="text-success mb-2">In Stock</span>
            @elseif($product->calcStock() < 10 && $product->calcStock() > 0)
            <span class="text-dark mb-2">Last {{ $product->calcStock() }} Item</span>
            @else
            <span class="text-danger mb-2">Out of Stock</span>
            @endif
                <br>
                <div class="btn-group mt-2 " role="group" >
                @if($product->calcStock() > 0) 
                <button wire:click="addToCart" class="btn btn-sm btn-dark rounded-0 "><i class="icon-basket-loaded"></i> Add to Cart</button>
                @else
                <a class="btn btn-sm btn-light  rounded-0  align-left" href="{{route('contact_us')}}">Contact Us</a>
                @endif
                <a  class="btn btn-sm add_wishlist" wire:click="addToFav"><i class="{{$userFavorited == 0 ? 'far' : 'fas'}} fa-heart text-danger"></i></a>

                </div>
            
        </div>
    </div>

</div>
