
    <div class="row shop_container grid" id="product-list">
        @if($products->count() > 0)
        @foreach ($products as $product)
        <div class="col-md-12 col-6 ">
            @livewire('customer.product-card-horizontal', ['product' => $product,'type' => 'card'], key($product->id))
        </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $products->links()  }}
        </div>
        
        @else
        <p>No Product Found</p>
        @endif
    </div>
    @push('scripts')
        <script>
            Livewire.restart();
            
        </script>
    @endpush
