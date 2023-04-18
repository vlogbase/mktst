@extends('customer.layouts.master')
@section('title','SavoyFoods | Catering Supplies | UK')
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
    border:1px solid #fff;
}
.circle-custom:after {
    content: "";
    display: block;
    width: 100%;
    height: 100%;
    background: radial-gradient(ellipse at center, rgba(255,255,255,0) 50%,rgba(255,255,255,1) 70%,rgba(255,255,255,1) 100%);
    border-radius: 50%;
    position: absolute;
    top: 0; left: 0;
}
</style>
@endsection
@section('loader')
<!-- LOADER -->
<div class="preloader">
    <div class="lds-ellipsis">
        <img src="/upload/other/loading_gif_main.gif" alt="">
    </div>
</div>
<!-- END LOADER -->
@endsection
@section('content')

<!-- START SECTION BANNER -->
<div class="d-none d-md-block banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($sliders as $slider)
            <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}} background_bg" data-img-src="{{$slider->image}}">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-7 col-9">
                                <div class="banner_content overflow-hidden">
                                	<h5 class="mb-3 staggered-animation font-weight-light {{$slider->light == 1 ? 'text-white' : ''}}" data-animation="slideInLeft" data-animation-delay="0.5s">{{$slider->top_head}}</h5>
                                    <h2 class="staggered-animation {{$slider->light == 1 ? 'text-white' : ''}}" data-animation="slideInLeft" data-animation-delay="1s">{{$slider->mid_head}}</h2>
                                    @if($slider->button_status)
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="{{$slider->button_action}}" data-animation="slideInLeft" data-animation-delay="1.5s">{{$slider->button_text}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER -->

<!-- START SECTION BANNER PHONES -->
<div class="d-block d-md-none banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($sliders2 as $slider)
            <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}} background_bg" data-img-src="{{$slider->image}}">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-7 col-9">
                                <div class="banner_content overflow-hidden">
                                	<h5 class="mb-3 staggered-animation font-weight-light {{$slider->light == 1 ? 'text-white' : ''}}" data-animation="slideInLeft" data-animation-delay="0.5s">{{$slider->top_head}}</h5>
                                    <h2 class="staggered-animation {{$slider->light == 1 ? 'text-white' : ''}}" data-animation="slideInLeft" data-animation-delay="1s">{{$slider->mid_head}}</h2>
                                    @if($slider->button_status)
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="{{$slider->button_action}}" data-animation="slideInLeft" data-animation-delay="1.5s">{{$slider->button_text}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER PHONES -->


<!-- START SECTION SHOP -->
<div class="section small_pt pb_70">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
                <div class="heading_s4 text-center">
                    <h2>Food Supplies for All Sectors</h2>
                    <hr>
                </div>
                
            </div>
		</div>
        <div class="row pt-5 pb-4">

            <div class="row">
                <div class="col-md-4  text-center box_linked mt-4 mb-4">
                    <div class="circle-custom categorybox">
                        <img class="" style="width:300px;" src="upload/other/1restauraunt.png">
                    </div>
                    <h4 class="title">Cafes & Restaurants</h4>
                    
                </div>
                <div class="col-md-4  text-center box_linked mt-4 mb-4">
                    <div class="circle-custom categorybox">
                        <img class="" style="width:300px;" src="upload/other/2cafe.png">
                    </div>
                    <h4 class="title">Pubs & Hotels</h4>
                    
                </div>

                <div class="col-md-4  text-center box_linked mt-4 mb-4">
                    <div class="circle-custom categorybox">
                        <img class="" style="width:300px;" src="upload/other/3retail.png">
                    </div>
                    <h4 class="title">Retail & Convenience Stores</h4>
                    
                </div>



                <div class="col-md-3  text-center box_linked mt-4 mb-4">
                    <div class="circle-custom categorybox">
                        <img class="" style="width:250px;" src="upload/other/7offshore.png">
                    </div>
                    <h4 class="title">Offshore</h4>
                    
                </div>
                <div class="col-md-3  text-center box_linked mt-4 mb-4">
                    <div class="circle-custom categorybox">
                        <img class="" style="width:250px;" src="upload/other/8hospital.png">
                    </div>
                    <h4 class="title">Hospitals</h4>
                    
                </div>
                <div class="col-md-3  text-center box_linked mt-4 mb-4">
                    <div class="circle-custom categorybox">
                        <img class="" style="width:250px;" src="upload/other/9school.png">
                    </div>
                    <h4 class="title">Schools</h4>
                    
                </div>
                <div class="col-md-3  text-center box_linked mt-4 mb-4">
                    <div class="circle-custom categorybox">
                        <img class="" style="width:250px;" src="upload/other/4fastfood.png">
                    </div>
                    <h4 class="title">Fast-Food</h4>
                    
                </div>


            </div>

        </div> <!-- row.// -->
    </div>
</div>
<!-- END SECTION SHOP -->


@guest
<!-- START SECTION SINGLE BANNER --> 
<div class="section bg_light_blue2 pb-0 pt-md-0">
	<div class="container">
    	<div class="row align-items-center flex-row-reverse pt-5">
            <div class="col-md-6 offset-md-1">
            	<div class="medium_divider d-none d-md-block clearfix"></div>
            	<div class="trand_banner_text text-center text-md-start">
                    <div class="heading_s1 mb-3">
                        <span class="sub_heading">Register to Savoy!</span>
                       
                        <p>We want to give our customers the best service. Sign up and enjoy good product supply, fast and easy service.</p>
                    </div>
                    <a href="{{route('register')}}"  class="btn btn-fill-out rounded-0 staggered-animation">Become a Member!</a>
                </div>
            	<div class="medium_divider clearfix"></div>
            </div>
            <div class="col-md-5">
                <div class="text-center trading_img">
                    <img src="upload/other/memberbecome.png" style="width:300px;" alt="tranding_img"/>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SINGLE BANNER --> 
@endguest

<section class="section-content  mt-5 mb-5">
    <div class="heading_s1 text-center">
        <h2>Product Categories</h2>
        
    </div>
    <div class="container mt-5 ">
        <div class="row">
            @foreach($customerpagedata['categories'] as $category)
                <div class="col-md-3 mx-auto col-6 mt-4 mb-4" style="cursor:pointer;" >
                    <!-- ============================ COMPONENT ITEM BG ================================= -->
                    <a href="{{route('category_products',$category->slug)}}">
                    <div class="categorybox card card-banner border-0">
                        <div class="p-3 text-center" style="width:100%">
                            <img src="{{$category->image}}" style="width:180px;" alt="{{$category->name}}">
                            <h5 class="card-title mt-2">{{$category->name}}</h5>
                        </div>
                    </div>
                    </a>
                    <!-- ============================ COMPONENT ITEM BG  END .// =========================== -->
                </div> <!-- col.// -->
            @endforeach
        </div> <!-- row.// -->


    </div> <!-- container .//  -->
</section>



@if($featured->count() > 0 || $best_seller->count() > 0 || $new_arrival->count() > 0 || $special_offer->count() > 0)
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
                <div class="row mt-3 ">
                    @for($i = 0; $i<3;$i++)
                    <div class="card col-md-3 mx-auto" aria-hidden="true">
                        <div style="background-color: gray; height:150px;" src="#" class="card-img-top mt-2" alt="..."></div>
                        <div class="card-body">
                          <h5 class="card-title placeholder-glow">
                            <span class="placeholder col-6"></span>
                          </h5>
                          <p class="card-text placeholder-glow">
                            <span class="placeholder col-7"></span>
                            <span class="placeholder col-4"></span>
                            <span class="placeholder col-4"></span>
                            <span class="placeholder col-6"></span>
                            <span class="placeholder col-8"></span>
                          </p>
                          <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                        </div>
                    </div>
                    @endfor
                   
                </div>
                <h5 class="text-muted mt-4">Coming Soon!</h5>
            	{{-- <div class="tab-style1">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        @if($featured->count() > 0)
                        <li class="nav-item">
                            <a class="nav-link {{$featured->count() > 0 ? 'active' : ''}}" id="arrival-tab" data-bs-toggle="tab" href="#arrival" role="tab" aria-controls="arrival" aria-selected="true">Featured</a>
                        </li>
                        @endif
                        @if($best_seller->count() > 0)
                        <li class="nav-item">
                            <a class="nav-link {{!$featured->count() > 0 && $best_seller->count() > 0 ? 'active' : ''}}" id="sellers-tab" data-bs-toggle="tab" href="#sellers" role="tab" aria-controls="sellers" aria-selected="false">Best Sellers</a>
                        </li>
                        @endif
                        @if($new_arrival->count() > 0)
                        <li class="nav-item">
                            <a class="nav-link {{!$featured->count() > 0 && !$best_seller->count() > 0 && $new_arrival->count() > 0 ? 'active' : ''}}" id="featured-tab" data-bs-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="false">New Arrival</a>
                        </li>
                        @endif
                        @if($special_offer->count() > 0)
                        <li class="nav-item">
                            <a class="nav-link {{!$featured->count() > 0 && !$best_seller->count() > 0  && !$new_arrival->count() > 0 && $special_offer->count() > 0 ? 'active' : ''}}" id="special-tab" data-bs-toggle="tab" href="#special" role="tab" aria-controls="special" aria-selected="false">Special Offer</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="tab-content">
                    @if($featured->count() > 0)
                	<div class="tab-pane fade {{$featured->count() > 0 ? 'show active' : ''}}" id="arrival" role="tabpanel" aria-labelledby="arrival-tab">
                        <div class="row shop_container">
                            @foreach ($featured as $product)
                            <div class="col-lg-3 col-md-4 col-6">
                                @livewire('customer.product-card', ['product' => $product])
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if($best_seller->count() > 0)
                    <div class="tab-pane fade {{!$featured->count() > 0 && $best_seller->count() > 0 ? 'show active' : ''}}" id="sellers" role="tabpanel" aria-labelledby="sellers-tab">
                        <div class="row shop_container">
                            @foreach ($best_seller as $product)
                            <div class="col-lg-3 col-md-4 col-6">
                                @livewire('customer.product-card', ['product' => $product])
                            </div>
                            @endforeach 
                        </div>
                    </div>
                    @endif
                    @if($new_arrival->count() > 0)
                    <div class="tab-pane fade {{!$featured->count() > 0 && !$best_seller->count() > 0 && $new_arrival->count() > 0 ? 'show active' : ''}}" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                        <div class="row shop_container">
                            @foreach ($new_arrival as $product)
                            <div class="col-lg-3 col-md-4 col-6">
                                @livewire('customer.product-card', ['product' => $product])
                            </div>
                            @endforeach 
                        </div>
                    </div>
                    @endif
                    @if($special_offer->count() > 0)
                    <div class="tab-pane fade {{!$featured->count() > 0 && !$best_seller->count() > 0  && !$new_arrival->count() > 0 && $special_offer->count() > 0 ? 'show active' : ''}}" id="special" role="tabpanel" aria-labelledby="special-tab">
                        <div class="row shop_container">
                            @foreach ($special_offer as $product)
                            <div class="col-lg-3 col-md-4 col-6">
                                @livewire('customer.product-card', ['product' => $product])
                            </div>
                            @endforeach 
                        </div>
                    </div>
                    @endif
                </div> --}}
            </div>
        </div> 
    </div>
</div>
<!-- END SECTION SHOP -->
@endif
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
                    <a href="https://play.google.com/store/apps/details?id=com.savoyapp"><img src="upload/other/googleplay.png" alt="f1"/></a>
                    <a href="https://apps.apple.com/tr/app/savoyapp/id1587340149?l=en"><img src="upload/other/appstore.png" alt="f2"/></a>
                    <a href="https://appgallery.huawei.com/#/app/C104547059"><img src="upload/other/appgallery.png" alt="f2"/></a>
                </div>
            	<div class="medium_divider clearfix"></div>
            </div>
            <div class="col-md-5">
                <div class="text-center trading_img">
                    <img src="upload/other/savoymockup.png" alt="tranding_img"/>
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
                	<h2>Latest News</h2>
                </div>
                <p class="leads text-center">Read the latest news on the Savoy</p>
            </div>
        </div>
        <div class="row justify-content-center">
            @if (count($news) > 0 )
                @foreach($news as $new)
                <div class="col-lg-4 col-md-6">
                    <div class="blog_post blog_style1 box_shadow1">
                        <div class="blog_img">
                            <a href="{{route('news.detail',$new->slug)}}">
                                <img src="{{$new->image}}" alt="{{$new->name}}">
                            </a>
                        </div>
                        <div class="blog_content bg-white">
                            <div class="blog_text">
                                <h5 class="blog_title"><a href="{{route('news.detail',$new->slug)}}">{{$new->name}}</a></h5>
                                <ul class="list_none blog_meta">
                                    <li class="text-secondary"><i class="ti-calendar"></i> {{$new->humanTime()}}</li>
                                    
                                </ul>
                                <p>{{substr($new->text, 0, 150).'...'}}</p>
                            </div>
                            <a href="{{route('news.detail',$new->slug)}}" class="mt-3 btn btn-fill-out rounded-0 staggered-animation ">Read More</a>
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
<div class="section bg_light_blue2 pb-md-5  pt-md-5">
	<div class="container">
    	<div class="row align-items-center flex-row-reverse pt-5">
            <div class="col-md-6 offset-md-1">
            	<div class="medium_divider d-none d-md-block clearfix"></div>
            	<div class="trand_banner_text text-center text-md-start">
                    <div class="heading_s1 mb-3">
                       
                        <h2>Member of Suffolk Chamber of Commerce</h2>
                    </div>
                    <p class="mb-4 leads">We are pleased and excited to be a new member of the Suffolk trade of commerce and look forward to forging, 
                        and working with local/reginal businesses and building a strong community and business relationships.</p>
                   
                </div>
            	<div class="medium_divider clearfix"></div>
            </div>
            <div class="col-md-5">
                <div class="text-center trading_img">
                    <img src="upload/other/memberscof.jpg" style="width:350px;" alt="tranding_img"/>
                </div>
            </div>
        </div>
        <div class="row align-items-center flex-row-reverse pt-5">
            <div class="col-md-3">
                <div class="text-center trading_img">
                    <img src="upload/other/fairway200.png" alt="tranding_img"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center trading_img">
                    <img src="upload/other/lifestylesavoy.png" alt="tranding_img"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center trading_img">
                    <img src="upload/other/united200.png" alt="tranding_img"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center trading_img">
                    <img src="upload/other/unitas200.png" alt="tranding_img"/>
                </div>
            </div>
        </div>
        <div class="row align-items-center  pt-5">
            <div class="col-md-12 text-center">
            <p class="leads">
                CLICK ON THE LINKS BELOW FOR FREE TO USE WASTE TOOLKIT AND CALORIE CALCULATOR PROVIDED BY UNILEVER FOOD
            </p>
            <a href="https://www.unileverfoodsolutions.co.uk/chef-inspiration.html" target="_blank" class="btn btn-fill-out rounded-0 staggered-animation">Try Our Calorie Calculator Now!</a>
        </div>
        </div>
    </div>
</div>
<!-- END SECTION SINGLE BANNER --> 


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
