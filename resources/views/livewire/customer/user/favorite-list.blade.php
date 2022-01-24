<div class="table-responsive shop_cart_table">
    <table class="table">
        
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td class="product-thumbnail"><a href="{{route('product_detail',$product->slug)}}"><img src="{{$product->getCoverImage()}}" alt="product1"></a></td>
                <td class="product-price" data-title="Price">{{$product->sku }}</td>
                <td class="product-name" data-title="Product"><a href="{{route('product_detail',$product->slug)}}">{{$product->name }}</a></td>
                <td class="product-subtotal" data-title="Total">£{{$product->showPrice() }}</td>
                <td class="product-remove" wire:click="addToCart({{$product->id}})" data-title="Add to Cart"><a ><i class="fas fa-shopping-cart"></i></a></td>
                <td class="product-remove" wire:click="deleteItem({{$product->id}})" data-title="Remove"><a ><i class="ti-close"></i></a></td>

            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>
