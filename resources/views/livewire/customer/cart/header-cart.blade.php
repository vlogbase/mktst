<li class="dropdown cart_dropdown">
    <a class="nav-link cart_trigger {{request()->routeIs('cart') || request()->routeIs('checkout') ? 'active' : ''}}" href="#" data-bs-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">{{count($cartItems)}}</span></a>
    <div class="cart_box dropdown-menu dropdown-menu-right">
        <ul class="cart_list">
            @if(count($cartItems) > 0)
            @foreach($cartItems as $item)
            <li>
                @if(!request()->routeIs('checkout'))
                <a wire:click="removeItem({{$item->id}})" class="item_remove"><i class="ion-close"></i></a>
                @endif
                <a href="{{route('product_detail',$item->attributes['slug'])}}"><img style="background-color: white;width: 100px;height:100px;object-fit:contain;" src="{{$item->attributes['image']}}" alt="{{$item->name}}">{{$item->name}}</a>
                <span class="cart_quantity"> {{$item->quantity}} x <span class="cart_amount"> <span class="price_symbole">£</span></span>{{$item->price}}</span>
            </li>
            @endforeach
            @else
                <li>Cart Empty</li>
            @endif
        </ul>
        <div class="cart_footer">
            <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">£</span></span>{{$cartTotal}}</p>
            <p class="cart_buttons"><a href="{{route('cart')}}" class="btn btn-fill-line rounded-0 view-cart">View Cart</a><a href="{{route('checkout')}}" class="btn btn-fill-out rounded-0 checkout">Checkout</a></p>
        </div>
    </div>
</li>