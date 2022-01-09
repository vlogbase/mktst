


<!-- START HEADER -->
<header class="header_wrap fixed-top header_with_topbar">
	<div class="middle-header dark_skin border-bottom">
    	<div class="container">
        	<div class="nav_block">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img class="logo_light" src="/upload/logos/savoywhite.png" alt="logo" />
                    <img class="logo_dark" src="/upload/logos/savoylogo.png" alt="logo" />
                </a>
                <div class="contact_phone order-md-last">
                    <a href="tel:01493 855403"><i class="linearicons-phone-wave"></i>
                        <span>01493 855403</span></a>
                </div>
               
            </div>
        </div>
    </div>

    <div class="bottom_header dark_skin main_menu_uppercase ">
    	<div class="container">
            <div class="row align-items-center"> 
            	<div class="col-lg-3 col-md-4 col-sm-6 col-3">
                	<div class="categories_wrap">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#navCatContent" aria-expanded="false" class="categories_btn categories_menu">
                            <i class="linearicons-menu"></i><span>All Categories</span> 
                        </button>
                        <div id="navCatContent" class="navbar collapse">
                            <ul> 
                                @foreach($customerpagedata['categories'] as $category)
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-item nav-link dropdown-toggler" data-bs-toggle="dropdown" href="{{route('category_products',$category->slug)}}" ><span>{{$category->name}}</span></a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    @php
                                                        $countChild = $category->childrenCategories->count();
                                                        if($countChild > 8)
                                                        {
                                                            $groups = $category->childrenCategories->split(2);
                                                            $groups_1 =  $groups[0];
                                                            $groups_2 =  $groups[1];
                                                        }else{
                                                            $groups_1 = $category->childrenCategories;
                                                        }
                                                    @endphp

                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            @foreach ($groups_1 as $childCategory) 
                                                            <li><a class="dropdown-item nav-link nav_item" href="{{route('category_products',$childCategory->slug)}}">{{$childCategory->name}}</a></li>
                                                            @endforeach

                                                        </ul>
                                                    </li>
                                                    @if($countChild > 8)
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            @foreach ($groups_2 as $childCategory) 
                                                            <li><a class="dropdown-item nav-link nav_item" href="{{route('category_products',$childCategory->slug)}}">{{$childCategory->name}}</a></li>
                                                            @endforeach
                                                            
                                                        </ul>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5 text-center">
                                                <div class="header-banner2 ">
                                                    <img style="width:200px!important;" src="{{$category->image}}" alt="{{$category->name}}">
                                                    
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                @endforeach

                                
            
                            </ul>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                	<nav class="navbar navbar-expand-lg">
                    	<button class="navbar-toggler side_navbar_toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSidetoggle" aria-expanded="false"> 
                            <span class="ion-android-menu"></span>
                        </button> 
                        <div class="collapse navbar-collapse mobile_side_menu justify-content-end " id="navbarSidetoggle">
                            <ul class="navbar-nav">
                                <li><a class="nav-link nav_item {{request()->routeIs('home') ? 'active' : ''}}" href="{{route('home')}}">Home</a></li> 
                                    <li><a class="nav-link nav_item {{request()->routeIs('products') ? 'active' : ''}}" href="{{route('products')}}">Products</a></li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle nav-link {{request()->routeIs('about_us') || request()->routeIs('contact_us') || request()->routeIs('career')  || request()->routeIs('terms_and_conditions') ? 'active' : ''}}" href="#" data-bs-toggle="dropdown">Company</a>
                                        <div class="dropdown-menu">
                                            <ul> 
                                                <li><a class="dropdown-item nav-link nav_item {{request()->routeIs('about_us') ? 'active' : ''}}" href="{{route('about_us')}}">About Us</a></li> 
                                                <li><a class="dropdown-item nav-link nav_item {{request()->routeIs('contact_us') ? 'active' : ''}}" href="{{route('contact_us')}}">Contact Us</a></li> 
                                                <li><a class="dropdown-item nav-link nav_item {{request()->routeIs('career') ? 'active' : ''}}" href="{{route('career')}}">Career</a></li>
                                                <li><a class="dropdown-item nav-link nav_item {{request()->routeIs('terms_and_conditions') ? 'active' : ''}}" href="{{route('terms_and_conditions')}}">Terms & Conditions</a></li>  
                                            </ul>
                                        </div>
                                    </li>
                                    
                                    <li class="dropdown">
                                        <a class="dropdown-toggle nav-link {{request()->routeIs('blogs.index') || request()->routeIs('news.index') || request()->routeIs('gallery')  || request()->routeIs('video_gallery') ? 'active' : ''}}" href="#" data-bs-toggle="dropdown">Contents</a>
                                        <div class="dropdown-menu">
                                            <ul> 
                                                <li><a class="dropdown-item nav-link nav_item {{request()->routeIs('blogs.index') ? 'active' : ''}}" href="{{route('blogs.index')}}">Blog</a></li> 
                                                <li><a class="dropdown-item nav-link nav_item {{request()->routeIs('news.index') ? 'active' : ''}}" href="{{route('news.index')}}">News</a></li> 
                                                <li><a class="dropdown-item nav-link nav_item {{request()->routeIs('gallery') ? 'active' : ''}}" href="{{route('gallery')}}">Gallery</a></li> 
                                                {{-- <li><a class="dropdown-item nav-link nav_item {{request()->routeIs('video_gallery') ? 'active' : ''}}" href="{{route('video_gallery')}}">Video Gallery</a></li>  --}}
                                            </ul>
                                        </div>
                                    </li>
                                    
                            </ul>
                        </div>
                        <ul class="navbar-nav attr-nav align-items-center ">
                            <li><a href="{{route('login')}}" class="nav-link {{request()->routeIs('login') ? 'active' : ''}}">
                                {{-- <i class="linearicons-user"></i> --}}
                                <i class="linearicons-enter"></i>
                            </a></li>
                            <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger {{request()->routeIs('cart') || request()->routeIs('checkout') ? 'active' : ''}}" href="#" data-bs-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">2</span></a>
                                <div class="cart_box dropdown-menu dropdown-menu-right">
                                    <ul class="cart_list">
                                        <li>
                                            <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                            <a href="#"><img src="/customer_assets/images/cart_thamb1.jpg" alt="cart_thumb1">Variable product 001</a>
                                            <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00</span>
                                        </li>
                                        <li>
                                            <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                            <a href="#"><img src="/customer_assets/images/cart_thamb2.jpg" alt="cart_thumb2">Ornare sed consequat</a>
                                            <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>81.00</span>
                                        </li>
                                    </ul>
                                    <div class="cart_footer">
                                        <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>159.00</p>
                                        <p class="cart_buttons"><a href="{{route('cart')}}" class="btn btn-fill-line rounded-0 view-cart">View Cart</a><a href="{{route('checkout')}}" class="btn btn-fill-out rounded-0 checkout">Checkout</a></p>
                                    </div>
                                </div>
                            </li>
                            <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                                <div class="search_wrap">
                                    <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                                    <form>
                                        <input type="text" placeholder="Search" class="form-control" id="search_input">
                                        <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                                    </form>
                                </div><div class="search_overlay"></div>
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
</header>
<!-- END HEADER -->
