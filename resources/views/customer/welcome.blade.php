@extends('customer.layouts.master')
@section('title', 'Markket | Catering Supplies | UK')
@section('css')
    <style>
        .circle-custom {
            border-radius: 50%;
            display: inline-block;
            position: relative;
        }

        .circle-custom img {
            border-radius: 50%;
            display: block;
            border: 1px solid #fff;
        }

        .circle-custom:after {
            content: "";
            display: block;
            width: 100%;
            height: 100%;
            background: radial-gradient(ellipse at center, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 1) 70%, rgba(255, 255, 255, 1) 100%);
            border-radius: 50%;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
@endsection

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    @auth
        @livewire('customer.last-order-popup')
    @endauth


    <div class="py-5">
        <div class="container-fluid">
            @include('customer.component.carousel', ['sliders' => $sliders])
        </div>
    </div>


    <!-- START SECTION SHOP -->
    <div class="section small_pt pb_70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="heading_s4 text-center">
                        <h5>Why Settle for Less? Source from the UK's Most Reliable Wholesale Food Supplier and Keep Your
                            Kitchen Running Smoothly</h5>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

    <section class="section-content mb-5">
        <div class="heading_s1 text-center">
            <h2>Product Categories</h2>

        </div>
        <div class="container-fluid mt-5 ">
            <div class="row">
                <div class="col-md-2 col-12  text-center">
                    <div class="">
                        @include('customer.component.advert-slider', [
                            'adverts' => $adverts,
                            'side' => 'left',
                        ])
                    </div>
                </div>
                <div class="col-md-8 mx-auto col-12">
                    @include('customer.component.category')
                </div>
                <div class="col-md-2 col-12  text-center">
                    <div class="d-none d-md-block">
                        @include('customer.component.advert-slider', [
                            'adverts' => $adverts,
                            'side' => 'right',
                        ])
                    </div>
                </div>
            </div>
        </div> <!-- container .//  -->
    </section>

    <div class="section bg_light_blue2 pb-0 pt-md-0">
        <div class="container">
            <div class="row">
                <div class="col-9 mx-auto text-center pt-5 pb-5">
                    <p>
                        Reliable access to ingredients is crucial for the success of any restaurant or café. Without a
                        consistent supply from trusted food suppliers, a restaurant's kitchen may not be able to offer
                        certain items from their menu.
                    </p>
                    <p class="mt-2">
                        Having all the necessary ingredients readily available is essential for preparing both hot and cold
                        meals, salads, and beverages. As wholesale food suppliers in the UK, we guarantee that we will take
                        care of all your needs.
                    </p>

                    <p class="mt-2">
                        We offer fresh stock at competitive prices, ensuring that you can serve all the items on your menu.
                        With the convenience of online grocery shopping, you can easily browse and purchase the items you
                        require. However, with so many options available, it can be challenging to find the right wholesale
                        food supplier. That's why we're here to help.
                    </p>
                </div>
            </div>
        </div>
    </div>


    @if ($featured->count() > 0 || $best_seller->count() > 0 || $new_arrival->count() > 0 || $special_offer->count() > 0)
        <!-- START SECTION SHOP -->
        <div class="section small_pt pb_70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="heading_s1 text-center">
                            <h2>Exclusive Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="tab-style1">
                            <ul class="nav nav-tabs justify-content-center" role="tablist">
                                @if ($featured->count() > 0)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $featured->count() > 0 ? 'active' : '' }}" id="arrival-tab"
                                            data-bs-toggle="tab" href="#arrival" role="tab" aria-controls="arrival"
                                            aria-selected="true">Featured</a>
                                    </li>
                                @endif
                                @if ($best_seller->count() > 0)
                                    <li class="nav-item">
                                        <a class="nav-link {{ !$featured->count() > 0 && $best_seller->count() > 0 ? 'active' : '' }}"
                                            id="sellers-tab" data-bs-toggle="tab" href="#sellers" role="tab"
                                            aria-controls="sellers" aria-selected="false">Best Sellers</a>
                                    </li>
                                @endif
                                @if ($new_arrival->count() > 0)
                                    <li class="nav-item">
                                        <a class="nav-link {{ !$featured->count() > 0 && !$best_seller->count() > 0 && $new_arrival->count() > 0 ? 'active' : '' }}"
                                            id="featured-tab" data-bs-toggle="tab" href="#featured" role="tab"
                                            aria-controls="featured" aria-selected="false">New Arrival</a>
                                    </li>
                                @endif
                                @if ($special_offer->count() > 0)
                                    <li class="nav-item">
                                        <a class="nav-link {{ !$featured->count() > 0 && !$best_seller->count() > 0 && !$new_arrival->count() > 0 && $special_offer->count() > 0 ? 'active' : '' }}"
                                            id="special-tab" data-bs-toggle="tab" href="#special" role="tab"
                                            aria-controls="special" aria-selected="false">Special Offer</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="tab-content">
                            @if ($featured->count() > 0)
                                <div class="tab-pane fade {{ $featured->count() > 0 ? 'show active' : '' }}" id="arrival"
                                    role="tabpanel" aria-labelledby="arrival-tab">
                                    <div class="row shop_container">
                                        @foreach ($featured as $product)
                                            <div class="col-lg-3 col-md-4 col-6">
                                                @livewire('customer.product-card', ['product' => $product, 'type' => 'featured'], key($product->id))
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @if ($best_seller->count() > 0)
                                <div class="tab-pane fade {{ !$featured->count() > 0 && $best_seller->count() > 0 ? 'show active' : '' }}"
                                    id="sellers" role="tabpanel" aria-labelledby="sellers-tab">
                                    <div class="row shop_container">
                                        @foreach ($best_seller as $product)
                                            <div class="col-lg-3 col-md-4 col-6">
                                                @livewire('customer.product-card', ['product' => $product, 'type' => 'best seller'], key($product->id))
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @if ($new_arrival->count() > 0)
                                <div class="tab-pane fade {{ !$featured->count() > 0 && !$best_seller->count() > 0 && $new_arrival->count() > 0 ? 'show active' : '' }}"
                                    id="featured" role="tabpanel" aria-labelledby="featured-tab">
                                    <div class="row shop_container">
                                        @foreach ($new_arrival as $product)
                                            <div class="col-lg-3 col-md-4 col-6">
                                                @livewire('customer.product-card', ['product' => $product, 'type' => 'new arrival'], key($product->id))
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @if ($special_offer->count() > 0)
                                <div class="tab-pane fade {{ !$featured->count() > 0 && !$best_seller->count() > 0 && !$new_arrival->count() > 0 && $special_offer->count() > 0 ? 'show active' : '' }}"
                                    id="special" role="tabpanel" aria-labelledby="special-tab">
                                    <div class="row shop_container">
                                        @foreach ($special_offer as $product)
                                            <div class="col-lg-3 col-md-4 col-6">
                                                @livewire('customer.product-card', ['product' => $product, 'type' => 'Special Offer!'], key($product->id))
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->
    @endif


    @guest
        <!-- START SECTION SINGLE BANNER -->
        <div class="section bg_light_blue2 pb-0 pt-md-0">
            <div class="container">
                <div class="row align-items-center flex-row-reverse pt-5">
                    <div class="col-md-6 offset-md-1">
                        <div class="medium_divider d-none d-md-block clearfix"></div>
                        <div class="trand_banner_text text-center text-md-start">
                            <div class="heading_s1 mb-3">
                                <span class="sub_heading">Register for Markket Access!!</span>

                                <p>We want to give our customers the best service. Sign up and enjoy good product supply, fast
                                    and easy service.</p>
                            </div>
                            <a href="{{ route('register') }}" class="btn btn-fill-out rounded-0 staggered-animation">Become a
                                Member!</a>
                        </div>
                        <div class="medium_divider clearfix"></div>
                    </div>
                    <div class="col-md-5">
                        <div class="text-center trading_img">
                            <img class="lazy" data-src="upload/other/memberbecome.png" style="width:300px;"
                                alt="tranding_img" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SINGLE BANNER -->
    @endguest

    <!-- START SECTION BLOG -->
    <div class="section small_pt pb_70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="heading_s1 text-center">
                        <h2>Markket Latest Blogs</h2>
                    </div>
                    <p class="leads text-center">Read the latest blogs on the Marrket</p>
                </div>
            </div>
            <div class="row justify-content-center">
                @if (count($blogs) > 0)
                    @foreach ($blogs as $new)
                        <div class="col-lg-4 col-md-6">
                            <div class="blog_post blog_style1 box_shadow1">
                                <div class="blog_img">
                                    <a href="{{ route('news.detail', $new->slug) }}">
                                        <img class="lazy" data-src="{{ $new->image }}" alt="{{ $new->name }}">
                                    </a>
                                </div>
                                <div class="blog_content bg-white">
                                    <div class="blog_text">
                                        <h5 class="blog_title"><a
                                                href="{{ route('news.detail', $new->slug) }}">{{ $new->name }}</a>
                                        </h5>
                                        <ul class="list_none blog_meta">
                                            <li class="text-secondary"><i class="ti-calendar"></i>
                                                {{ $new->humanTime() }}</li>

                                        </ul>
                                        <p>{!! substr($new->text, 0, 150) . '...' !!}</p>
                                    </div>
                                    <a href="{{ route('news.detail', $new->slug) }}"
                                        class="mt-3 btn btn-fill-out rounded-0  ">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-12 text-center">
                        <h5 class="text-muted">Coming Soon</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- END SECTION BLOG -->


    <!-- START SECTION SINGLE BANNER -->
    <div class="section bg_light_blue2 pb-0 pt-md-0">
        <div class="container">
            <div class="row align-items-center flex-row-reverse pt-5">
                <div class="col-md-6 offset-md-1">
                    <div class="medium_divider d-none d-md-block clearfix"></div>
                    <div class="trand_banner_text text-center text-md-start">
                        <div class="heading_s1 mb-3">
                            <h2>Download our Mobile App!</h2>
                        </div>
                        <a href="https://play.google.com/store/apps/details?id=com.savoyapp"><img class="lazy"
                                data-src="upload/other/googleplay.png" alt="f1" /></a>
                        <a href="https://apps.apple.com/tr/app/savoyapp/id1587340149?l=en"><img class="lazy"
                                data-src="upload/other/appstore.png" alt="f2" /></a>
                        <a href="https://appgallery.huawei.com/#/app/C104547059"><img class="lazy"
                                data-src="upload/other/appgallery.png" alt="f2" /></a>
                    </div>
                    <div class="medium_divider clearfix"></div>
                </div>
                <div class="col-md-5">
                    <div class="text-center trading_img">
                        <img class="lazy" data-src="upload/other/savoymockup.png" alt="tranding_img" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SINGLE BANNER -->


     <!-- START SECTION BLOG -->
     <div class="section small_pt pb_70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="heading_s1 text-center">
                        <h2>Industry News</h2>
                    </div>
                    <p class="leads text-center">Latest news from industry publications</p>
                </div>
            </div>
            <div class="row ">
                @include('customer.component.latest-rss', ['feeds' => $rssFeeds])
            </div>
        </div>
    </div>
    <!-- END SECTION BLOG -->
   


    <!-- START SECTION SHOP INFO -->
    <div class="section pb_70">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-4">
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-shipped"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>Fast Delivery</h5>
                            <p>We deliver your orders quickly to you.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-lock"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>High Security</h5>
                            <p>All your transactions are secure with 256-bit SSL.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-support"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>27/4 Support</h5>
                            <p>7/24 Online Support Service for our customers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP INFO -->

    <!-- START SECTION SUBSCRIBE NEWSLETTER -->
    @livewire('customer.newsletter-main')
    <!-- START SECTION SUBSCRIBE NEWSLETTER -->


@endsection
