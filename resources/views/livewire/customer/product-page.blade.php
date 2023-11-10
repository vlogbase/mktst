<div class="row">
    <div class="col-lg-9">
        <div class="row align-items-center mb-4 pb-1">
            <div class="col-12 mt-2">
                @if (!request()->routeIs('products'))
                   
                    <div wire:ignore>
                        @if (count($categories) > 0)
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($categories as $category)
                                    <div class="col-md-4 swiper-slide card text-center">
                                        <a href="{{ route('category_products', $category->slug) }}">
                                            <img class="card-img-top" src="{{ $category->getCoverImage() }}"
                                                alt="Card image cap">
                                            <div class="card-body text-center">
                                                <p>{{ $category->name }}</p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    @endif
                    </div>
                    <div class="mt-4 product_header">
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
                @endif
            </div>
        </div>

        @if (!request()->routeIs('products'))
            @livewire('customer.product-list', ['categoryCurrent' => $categoryCurrent])
        @else
            <div class="row">
                @foreach ($customerpagedata['categories'] as $category)
                    <div class="col-md-2 col-4 mt-4 mb-4" style="cursor:pointer;">
                        <!-- ============================ COMPONENT ITEM BG ================================= -->
                        <a href="{{ route('category_products', $category->slug) }}">
                            <div class="categorybox card card-banner border-0">
                                <div class="p-3 text-center" style="width:100%">
                                    <img src="{{ $category->image }}" style="width:180px;" alt="{{ $category->name }}">
                                    <h6 class="card-title mt-2">{{ $category->name }}</h6>
                                </div>
                            </div>
                        </a>
                        <!-- ============================ COMPONENT ITEM BG  END .// =========================== -->
                    </div> <!-- col.// -->
                @endforeach
            </div>
        @endif
        
    </div>


    <div class="col-lg-3 order-first mt-4 pt-2 mt-lg-0 pt-lg-0">
        <div class="sidebar">
            <div class="widget">
                <h5 class="widget_title">Categories</h5>

                <ul class="widget_categories">
                    @if (!request()->routeIs('products'))
                        <li><a href="{{ route('products') }}"><span class="categories_name"
                                    style="font-size: 20px!important;font-weight:500;">All Categories</span></a>
                        </li>
                    @endif
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
                                            class="categories_name">Back to
                                            {{ $categoryCurrent->parent->name }}</span><span
                                            class="categories_num">({{ $categoryCurrent->parent->products->count() }})</span></a>
                                </li>
                            @endif
                        @endif
                    @endif
                </ul>
            </div>

            @livewire('customer.price-filter', ['product_max_price' => $product_max_price])

            @livewire('customer.product-brand-filter', ['brands' => $brands])
            @livewire('customer.product-discount-filter')
        
        </div>
    </div>
</div>

<style>
    .swiper-button-next {
        color: black;
    }

    .swiper-button-prev {
        color: black;
    }
</style>
