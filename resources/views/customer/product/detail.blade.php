@extends('customer.layouts.master')
@section('title', $product->name . ' - Markket')
@section('description', $product->productdetail->meta_description)
@section('content')
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section page-title-mini" style="background-color:chocolate;">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-12 text-center text-white">
                    <div class="page-title">
                        <h1 style="color:white!important;">{{ $product->name }}</h1>
                    </div>
                </div>
                
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->


    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row mb-3">
                    <div class="col">
                        <small><a class=" text-sm" href="{{url()->previous()}}">Back to List</a></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <div class="product-image">
                            <div class="product_img_box">
                                <img id="product_img" src='{{ $product->getCoverImage() }}'
                                    data-zoom-image="{{ $product->getCoverImage() }}" alt="product_img1" />
                                <a href="#" class="product_img_zoom" title="Zoom">
                                    <span class="linearicons-zoom-in"></span>
                                </a>
                            </div>
                            <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4"
                                data-slides-to-scroll="1" data-infinite="false">
                                @foreach ($product->productimages as $image)
                                    <div class="item">
                                        <a href="#"
                                            class="product_gallery_item {{ $loop->index == 0 ? 'active' : '' }}"
                                            data-image="{{ $image->path }}" data-zoom-image="{{ $image->path }}">
                                            <img src="{{ $image->path }}" alt="product_small_img1" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="pr_detail">
                            <div class="product_description">
                                <h4 class="product_title">{{ $product->name }}</h4>
                                @auth
                                    <div class="product_price">
                                        <span class="price">£{{ $product->showPrice() }}</span>
                                        @if ($product->discount > 0)
                                            <del>£{{ $product->unit_price }}</del>
                                        @endif
                                    </div>
                                @endauth

                                <br><br>

                                <div class="">
                                    <ul class="product-meta">
                                        <li>SKU: <span class="">{{ $product->sku }}</span></li>
                                        <li>Pack: <span class="">{{ $product->productdetail->pack }}</span></li>
                                        @auth
                                            <li>Per Price: <span
                                                    class="">{{ is_null($product->unit_per_price) ? '-' : '£' . $product->unit_per_price }}</span>
                                            </li>
                                        @endauth
                                        <li>Brand: <span class="">{{ $product->brand->name }}</span></li>
                                        <li>VAT: <span class="">+%{{ $product->taxrate }}</span></li>
                                        @auth
                                            <li>Status:
                                                @if ($product->calcStock() > 10)
                                                    <span class="font-weight-bold text-success mb-2">In Stock</span>
                                                @elseif($product->calcStock() < 10 && $product->calcStock() > 0)
                                                    <span class="  font-weight-bold text-info mb-2">Last
                                                        {{ $product->calcStock() }} Item</span>
                                                @else
                                                    <span class=" font-weight-bold text-danger mb-2">Out of Stock</span>
                                                @endif
                                            </li>
                                        @endauth
                                        <li>Categories:
                                            @foreach ($product->categories as $category)
                                                <a
                                                    href="{{ route('category_products', $category->slug) }}">{{ $category->name }}</a>
                                            @endforeach
                                        </li>

                                    </ul>
                                </div>

                            </div>
                            <hr />
                            @livewire('customer.product-detail-buttons', ['product' => $product])
                            <hr />


                            <div class="product_share">
                                @if ($product->calcStock() <= 0)
                                    <span class="text-danger">This product is currently not available. But if you contact
                                        us, we will try to supply it for you.</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="large_divider clearfix"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description"
                                        role="tab" aria-controls="Description" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                        href="#Additional-info" role="tab" aria-controls="Additional-info"
                                        aria-selected="false">Additional info</a>
                                </li>
                                {{-- <li class="nav-item">
                        	<a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews (2)</a>
                      	</li> --}}
                            </ul>
                            <div class="tab-content shop_info_tab">
                                <div class="tab-pane fade show active" id="Description" role="tabpanel"
                                    aria-labelledby="Description-tab">
                                    {!! $product->productdetail->description !!}
                                </div>
                                <div class="tab-pane fade" id="Additional-info" role="tabpanel"
                                    aria-labelledby="Additional-info-tab">
                                    @if ($product->productinfos->count() > 0)
                                        <table class="table table-bordered">
                                            @foreach ($product->productinfos as $info)
                                                <tr>
                                                    <td>{{ $info->key }}</td>
                                                    <td>{{ $info->value }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="small_divider"></div>
                        <div class="divider"></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="heading_s1">
                            <h3>Related Products </h3>
                        </div>
                        <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20"
                            data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                            @foreach ($related as $product)
                                @livewire('customer.product-card', ['product' => $product,'type' => 'card'], key($product->id))
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->


    </div>
    <!-- END MAIN CONTENT -->
@endsection
