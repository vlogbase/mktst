<div class="row">
    <div class="col-lg-9">
        <div class="row align-items-center mb-4 pb-1">
            <div class="col-12 mt-2">
                <div class="product_header">
                    <div class="product_header_left">

                        {{ $product_count }} Items Listed

                    </div>
                    <div class="product_header_right">
                        <div class="products_view">

                        </div>
                        <div class="custom_select">
                            <select wire:model="order_select" class="form-control form-control-sm">
                                <option value="latest">Latest</option>
                                <option value="cheapest">Cheapest</option>
                                <option value="expensive">Most Expensive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @livewire('customer.product-list', ['categoryCurrent' => $categoryCurrent])

        <div class="row " id="test-div">
            <div class="col-12">

            </div>
        </div>
    </div>
    <div class="col-lg-3 order-first mt-4 pt-2 mt-lg-0 pt-lg-0">
        <div class="sidebar">
            <div class="widget">
                <h5 class="widget_title">Categories</h5>
                <ul class="widget_categories">
                    @if ($categories->count() > 0)
                        @foreach ($categories as $category)
                            <li><a href="{{ route('category_products', $category->slug) }}"><span
                                        class="categories_name">{{ $category->name . (strlen($category->name) > 100 ? '<br>' : '') }}</span><span
                                        class="categories_num">({{ $category->activeProducts->count() }})</span></a>
                            </li>
                        @endforeach
                    @else
                        @if ($categoryCurrent)
                            <p>No Sub Categories</p>
                            @if ($categoryCurrent->parent)
                                <li><a href="{{ route('category_products', $categoryCurrent->parent->slug) }}"><span
                                            class="categories_name">Back to Top Category</span><span
                                            class="categories_num">({{ $categoryCurrent->parent->products->count() }})</span></a>
                                </li>
                            @endif
                        @endif
                    @endif
                </ul>
            </div>
            @livewire('customer.price-filter', ['product_max_price' => $product_max_price])

        </div>
    </div>
</div>
