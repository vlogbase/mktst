<div class="cart_extra">
    <div class="cart-product-quantity">
        <div class="quantity">
            <input type="button" wire:click="channgeQty('-')" value="-" class="minus">
            <input wire:model="quantity" type="number" step="1" title="Qty" class="qty" size="4">
            <input type="button" wire:click="channgeQty('+')" value="+" class="plus">
        </div>
    </div>
    <div class="cart_btn">
        @if($product->calcStock() > 0) 
        <button wire:click="addToCart" class="btn  btn-fill-out btn-addtocart" type="button"><i class="icon-basket-loaded"></i> Add to cart</button>
        @else
        <a class="btn  btn-light  rounded-0  align-left" href="{{route('contact_us')}}">Contact Us</a>
        @endif
        <a wire:click="addToFav" style="cursor:pointer;" class="add_wishlist" ><i class="{{$userFavorited == 0 ? 'far' : 'fas'}} fa-heart text-danger"></i></a>
    </div>
</div>

