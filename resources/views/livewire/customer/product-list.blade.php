
    <div class="row shop_container grid" id="product-list">
        @if($products->count() > 0)
        @foreach ($products as $product)
        <div class="col-md-12 col-6 d-none d-md-block">
            @livewire('customer.product-card-horizontal', ['product' => $product,'type' => 'card'], key($product->id))
        </div>
        <div class="col-md-8 col-6 d-md-none d-lg-none d-xl-none">
            @livewire('customer.product-card', ['product' => $product,'type' => 'card'], key($product->id))
        </div>
        @endforeach
        @else
        <p>No Product Found</p>
        @endif
    </div>
    
