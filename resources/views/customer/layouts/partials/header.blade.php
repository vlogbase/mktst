<!-- START HEADER -->
<header class="header_wrap static header_with_topbar">

    <div class="middle-header dark_skin border-bottom text-center"
        style="background-image: url('/upload/other/Grocery-Background.webp'); background-size: cover; background-position: 50% 0%;;">
        <div class="container ">
            <div class="nav_block ">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img style="width: 470px!important;" class="logo_light" src="/upload/logos/markketlogo6.png"
                        alt="logo" />
                    @if (request()->routeIs('home'))
                        <img style="width: 9000px!important;" class="logo_dark" src="/upload/logos/markketlogo6.png"
                            alt="logo" />
                    @else
                        <img style="width: 450px!important;" class="logo_dark" src="/upload/logos/markketlogo6.png"
                            alt="logo" />
                    @endif
                </a>
            </div>
        </div>
    </div>

    <div class="bottom_header light_skin main_menu_uppercase bg-dark">
        <div class="container">
            <div class="row align-items-center ">
                <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                    <div class="categories_wrap">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#navCatContent"
                            aria-expanded="false" class="categories_btn categories_menu">
                            <i class="linearicons-menu"></i><span>All Categories</span>
                        </button>
                        <div id="navCatContent" class="navbar collapse">
                            <ul>
                                @foreach ($customerpagedata['categories'] as $category)
                                    @if ($category->childrenCategories->count() > 0)
                                        <li class="dropdown dropdown-mega-menu">
                                            <a class="dropdown-item nav-link dropdown-toggler" data-bs-toggle="dropdown"
                                                href="{{ route('category_products', $category->slug) }}"><span>{{ $category->name }}</span></a>
                                            <div class="dropdown-menu">
                                                <ul class="mega-menu d-lg-flex">
                                                    <li class="mega-menu-col col-lg-7">
                                                        <ul class="d-lg-flex">
                                                            @php
                                                                $countChild = $category->childrenCategories->count();
                                                                if ($countChild > 8) {
                                                                    $groups = $category->childrenCategories->split(2);
                                                                    $groups_1 = $groups[0];
                                                                    $groups_2 = $groups[1];
                                                                } else {
                                                                    $groups_1 = $category->childrenCategories;
                                                                }
                                                            @endphp

                                                            <li class="mega-menu-col col-lg-6">
                                                                <ul>
                                                                    @foreach ($groups_1 as $childCategory)
                                                                        <li><a class="dropdown-item nav-link nav_item"
                                                                                href="{{ route('category_products', $childCategory->slug) }}">{{ $childCategory->name }}</a>
                                                                        </li>
                                                                    @endforeach

                                                                </ul>
                                                            </li>
                                                            @if ($countChild > 8)
                                                                <li class="mega-menu-col col-lg-6">
                                                                    <ul>
                                                                        @foreach ($groups_2 as $childCategory)
                                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                                    href="{{ route('category_products', $childCategory->slug) }}">{{ $childCategory->name }}</a>
                                                                            </li>
                                                                        @endforeach

                                                                    </ul>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-5 text-center">
                                                        <div class="header-banner2 ">
                                                            <img style="width:200px!important;"
                                                                src="{{ $category->image }}"
                                                                alt="{{ $category->name }}">

                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @else
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="{{ route('category_products', $category->slug) }}">{{ $category->name }}</a>
                                        </li>
                                    @endif
                                @endforeach



                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler side_navbar_toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSidetoggle" aria-expanded="false">
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="collapse navbar-collapse mobile_side_menu justify-content-end "
                            id="navbarSidetoggle">
                            <ul class="navbar-nav">
                                <li><a style="font-size: 17px!important;"
                                        class="nav-link nav_item {{ request()->routeIs('home') ? 'active' : '' }}"
                                        href="{{ route('home') }}">Home</a></li>
                                <li><a style="font-size: 17px!important;"
                                        class="nav-link nav_item {{ request()->routeIs('products') ? 'active' : '' }}"
                                        href="{{ route('products') }}">Products</a></li>
                                <li class="dropdown">
                                    <a style="font-size: 17px!important;"
                                        class="dropdown-toggle nav-link {{ request()->routeIs('about_us') || request()->routeIs('contact_us') || request()->routeIs('career') || request()->routeIs('terms_and_conditions') ? 'active' : '' }}"
                                        href="#" data-bs-toggle="dropdown">Company</a>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li><a class="dropdown-item nav-link nav_item {{ request()->routeIs('about_us') ? 'active' : '' }}"
                                                    href="{{ route('about_us') }}">About Us</a></li>
                                            <li><a class="dropdown-item nav-link nav_item {{ request()->routeIs('contact_us') ? 'active' : '' }}"
                                                    href="{{ route('contact_us') }}">Contact Us</a></li>
                                            <li><a class="dropdown-item nav-link nav_item {{ request()->routeIs('career') ? 'active' : '' }}"
                                                    href="{{ route('career') }}">Career</a></li>
                                            <li><a class="dropdown-item nav-link nav_item {{ request()->routeIs('terms_and_conditions') ? 'active' : '' }}"
                                                    href="{{ route('terms_and_conditions') }}">Terms & Conditions</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="dropdown">
                                    <a style="font-size: 17px!important;"
                                        class="dropdown-toggle nav-link {{ request()->routeIs('blogs.index') || request()->routeIs('news.index') || request()->routeIs('gallery') || request()->routeIs('video_gallery') ? 'active' : '' }}"
                                        href="#" data-bs-toggle="dropdown">Contents</a>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li><a class="dropdown-item nav-link nav_item {{ request()->routeIs('blogs.index') ? 'active' : '' }}"
                                                    href="{{ route('blogs.index') }}">Blog</a></li>
                                            <li><a class="dropdown-item nav-link nav_item {{ request()->routeIs('news.index') ? 'active' : '' }}"
                                                    href="{{ route('news.index') }}">News</a></li>
                                            <li><a class="dropdown-item nav-link nav_item {{ request()->routeIs('gallery') ? 'active' : '' }}"
                                                    href="{{ route('gallery') }}">Gallery</a></li>
                                            {{-- <li><a class="dropdown-item nav-link nav_item {{request()->routeIs('video_gallery') ? 'active' : ''}}" href="{{route('video_gallery')}}">Video Gallery</a></li>  --}}
                                        </ul>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <ul class="navbar-nav attr-nav align-items-center ">
                            <li>
                                @if (Auth::check())
                                    <a href="{{ route('user.profile') }}" class="nav-link "><i
                                            class="linearicons-user"></i>
                                    </a>
                                @endif
                                @guest
                                    <a href="{{ route('login') }}"
                                        class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"><i
                                            class="linearicons-enter"></i>

                                    </a>
                                @endguest
                            </li>
                            @livewire('customer.cart.header-cart')

                            <li><a href="javascript:void(0);" class="nav-link search_trigger"><i
                                        class="linearicons-magnifier"></i></a>
                                <div class="search_wrap">
                                    <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                                    <form method="post" action="{{ route('search') }}">
                                        {{ csrf_field() }}
                                        <input type="text" placeholder="Search" name="search_text"
                                            class="form-control" id="search_input">
                                        <button type="submit" class="search_icon"><i
                                                class="ion-ios-search-strong"></i></button>
                                    </form>
                                </div>
                                <div class="search_overlay"></div>
                            </li>

                        </ul>

                    </nav>
                </div>

            </div>
        </div>
    </div>

</header>
<!-- END HEADER -->
