
    <div class="row shop_container grid" id="product-list">
        @if($products->count() > 0)
        @foreach ($products as $product)
        <div class="col-md-12 col-6">
            @livewire('customer.product-card-horizontal', ['product' => $product,'type' => 'card'], key($product->id))
        </div>
        @endforeach
        @else
        <p>No Product Found</p>
        @endif
    </div>
    
