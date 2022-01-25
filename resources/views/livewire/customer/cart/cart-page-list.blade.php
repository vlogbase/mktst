<div>
    @if(session()->has('cart_alert'))
            <h3>{{ session('cart_alert') }}</h3>
    @endif
    @if (session()->has('need_delete_products'))
            <div class="alert alert-danger">
                <h4>Deleted Products</h4>
                    @foreach (session('need_delete_products') as $deleted)
                        <p>{{$deleted}}</p>
                    @endforeach
            </div>
    @endif
    @if (session()->has('need_update_products'))
            <div class="alert alert-warning">
                <h4>Updated Products</h4>
                @foreach (session('need_update_products') as $updated)
                        <p>{{$updated}}</p>
                    @endforeach
            </div>
        @endif
    @if(count($cartItems) > 0)
    <table class="table">
        <thead>
            <tr>
                <th class="product-thumbnail">&nbsp;</th>
                <th class="product-name">Product</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-subtotal">Total</th>
                <th class="product-remove">Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr>
                <td class="product-thumbnail"><a href="{{route('product_detail',$item->attributes['slug'])}}"><img src="{{$item->attributes['image']}}" alt="product1"></a></td>
                <td class="product-name" data-title="Product"><a href="{{route('product_detail',$item->attributes['slug'])}}">{{$item->name}}</a></td>
                <td class="product-price" data-title="Price">£{{$item->price}}</td>
                <td class="product-quantity" data-title="Quantity">
                    @livewire('customer.cart.cart-page-quantity', ['item' => $item], key($item->id))
                </td>
                <td class="product-subtotal" data-title="Total">£{{$item->price * $item->quantity}}</td>
                <td class="product-remove" data-title="Remove"><a wire:click="removeItem({{$item->id}})" style="cursor: pointer;"><i class="ti-close"></i></a></td>
            </tr>
        
            @endforeach
        </tbody>
    </table>
    @else
        <h3>Cart Empty!</h3>
        
    @endif
</div>
