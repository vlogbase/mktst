<div>
    @if($products->count() > 0)
    <div class="">
        <h4 class="">Special offers for you!</h4>
        <div class="mt-3">
            @foreach($products as $product)
            <div>
                @livewire('customer.product-card-horizontal', ['product' => $product], key($product->id))
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
