@if ($categories->count() > 0)
<div class="row mb-5 " style="overflow: hidden; ">
    <!-- Slider main container -->
    <!-- Additional required wrapper -->
    <div class="swiper-container" >
        <div class="col-md-8 swiper-wrapper" >
            @foreach ($categories as $category)
    
                    <div class="col-md-4 swiper-slide card text-center" >
                        <a href="{{ route('category_products', $category->slug) }}">
                        <img class="card-img-top" src="{{$category->getCoverImage()}}" alt="Card image cap">
                        <div class="card-body text-center">
                            <p>{{ $category->name }}</p>
                        </div>
                    </a>
                    </div>
            @endforeach
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
    
        <!-- If we need navigation buttons -->
        <div  class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    
        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>
    

</div>
@endif



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
                        @if ($category->category_id !== null)
                            <a href="{{ route('products') }}"><span class="categories_name">Back to Top</span></a>
                        @endif
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

        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
    var mySwiper = new Swiper('.swiper-container', {
        speed: 250,
        spaceBetween: 25,
        initialSlide: 0,
        //truewrapper adoptsheight of active slide
        autoHeight: true,
        // Optional parameters

        loop: false,
        // delay between transitions in ms
        autoplay: 5000,
        autoplayStopOnLast: false, // loop false also
        // If we need pagination
        pagination: '.swiper-pagination',
        paginationType: "bullets",

        // Navigation arrows
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',

        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

        // And if we need scrollbar
        //scrollbar: '.swiper-scrollbar',
        // "slide", "fade", "cube", "coverflow" or "flip"
        effect: 'slide',

        //
        slidesPerView: 'auto',
        //
        centeredSlides: false,
        //
        slidesOffsetBefore: 0,
        //
        grabCursor: true,
        paginationClickable: true,
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 4,
                spaceBetween: 40
            }
        }
    })
</script>

<style>



</style>