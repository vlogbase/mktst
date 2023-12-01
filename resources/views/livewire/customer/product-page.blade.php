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
                                                <img class="card-img-top lazy" data-src="{{ $category->getCoverImage() }}"
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
            @include('customer.component.category')
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
            @livewire('customer.special-category-filter')

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

    .vibration-container {
        position: relative;
    }

    .vibration {
        animation: vibrate 1s infinite;
    }

    @keyframes vibrate {
        0% {
            transform: translateX(0);
            transform: translateY(0);
        }

        25% {
            transform: translateX(-3px);
            transform: translateY(-3px);
        }

        50% {
            transform: translateX(3px);
            transform: translateY(3px);
        }

        75% {
            transform: translateX(-3px);
            transform: translateY(-3px);
        }

        100% {
            transform: translateX(3px);
            transform: translateY(3px);
        }
    }
</style>
