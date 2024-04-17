<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
    <div class="menu-item">
        <div class="menu-content pb-2">
            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
        </div>
    </div>
    <div class="menu-item">
        <a class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                        <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                        <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                        <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Dashboard</span>
        </a>
    </div>

    <div class="menu-item">
        <a class="menu-link {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}" href="{{ route('admin.brands.list') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M18 21.6C16.6 20.4 9.1 20.3 6.3 21.2C5.7 21.4 5.1 21.2 4.7 20.8L2 18C4.2 15.8 10.8 15.1 15.8 15.8C16.2 18.3 17 20.5 18 21.6ZM18.8 2.8C18.4 2.4 17.8 2.20001 17.2 2.40001C14.4 3.30001 6.9 3.2 5.5 2C6.8 3.3 7.4 5.5 7.7 7.7C9 7.9 10.3 8 11.7 8C15.8 8 19.8 7.2 21.5 5.5L18.8 2.8Z" fill="black" />
                        <path opacity="0.3" d="M21.2 17.3C21.4 17.9 21.2 18.5 20.8 18.9L18 21.6C15.8 19.4 15.1 12.8 15.8 7.8C18.3 7.4 20.4 6.70001 21.5 5.60001C20.4 7.00001 20.2 14.5 21.2 17.3ZM8 11.7C8 9 7.7 4.2 5.5 2L2.8 4.8C2.4 5.2 2.2 5.80001 2.4 6.40001C2.7 7.40001 3.00001 9.2 3.10001 11.7C3.10001 15.5 2.40001 17.6 2.10001 18C3.20001 16.9 5.3 16.2 7.8 15.8C8 14.2 8 12.7 8 11.7Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Brands</span>
        </a>
    </div>
    <div class="menu-item">
        <a class="menu-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.list') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M18 21.6C16.6 20.4 9.1 20.3 6.3 21.2C5.7 21.4 5.1 21.2 4.7 20.8L2 18C4.2 15.8 10.8 15.1 15.8 15.8C16.2 18.3 17 20.5 18 21.6ZM18.8 2.8C18.4 2.4 17.8 2.20001 17.2 2.40001C14.4 3.30001 6.9 3.2 5.5 2C6.8 3.3 7.4 5.5 7.7 7.7C9 7.9 10.3 8 11.7 8C15.8 8 19.8 7.2 21.5 5.5L18.8 2.8Z" fill="black" />
                        <path opacity="0.3" d="M21.2 17.3C21.4 17.9 21.2 18.5 20.8 18.9L18 21.6C15.8 19.4 15.1 12.8 15.8 7.8C18.3 7.4 20.4 6.70001 21.5 5.60001C20.4 7.00001 20.2 14.5 21.2 17.3ZM8 11.7C8 9 7.7 4.2 5.5 2L2.8 4.8C2.4 5.2 2.2 5.80001 2.4 6.40001C2.7 7.40001 3.00001 9.2 3.10001 11.7C3.10001 15.5 2.40001 17.6 2.10001 18C3.20001 16.9 5.3 16.2 7.8 15.8C8 14.2 8 12.7 8 11.7Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Categories</span>
        </a>
    </div>
    <div class="menu-item">
        <a class="menu-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" href="{{ route('admin.products.list') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M20 22H4C3.4 22 3 21.6 3 21V2H21V21C21 21.6 20.6 22 20 22Z" fill="black" />
                        <path d="M12 14C9.2 14 7 11.8 7 9V5C7 4.4 7.4 4 8 4C8.6 4 9 4.4 9 5V9C9 10.7 10.3 12 12 12C13.7 12 15 10.7 15 9V5C15 4.4 15.4 4 16 4C16.6 4 17 4.4 17 5V9C17 11.8 14.8 14 12 14Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Products</span>
        </a>
    </div>
    <div class="menu-item">
        <a class="menu-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" href="{{ route('admin.orders.list') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="black" />
                        <path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="black" />
                        <path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Orders</span>
        </a>
    </div>
    <div class="menu-item">
        <a class="menu-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}" href="{{ route('admin.customers.list') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="black" />
                        <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="black" />
                        <path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="black" />
                        <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Customers</span>
        </a>
    </div>
    <div class="menu-item">
        <a class="menu-link {{ request()->routeIs('admin.sellers.*') ? 'active' : '' }}" href="{{ route('admin.sellers.list') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="black" />
                        <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="black" />
                        <path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="black" />
                        <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Brand Owners</span>
        </a>
    </div>
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
        <span class="menu-link {{ request()->routeIs('admin.campaigns.*') ? 'active' : '' }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M18 22H6C5.4 22 5 21.6 5 21V8C6.6 6.4 7.4 5.6 9 4H15C16.6 5.6 17.4 6.4 19 8V21C19 21.6 18.6 22 18 22ZM12 5.5C11.2 5.5 10.5 6.2 10.5 7C10.5 7.8 11.2 8.5 12 8.5C12.8 8.5 13.5 7.8 13.5 7C13.5 6.2 12.8 5.5 12 5.5Z" fill="black" />
                        <path d="M12 7C11.4 7 11 6.6 11 6V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V6C13 6.6 12.6 7 12 7ZM15.1 10.6C15.1 10.5 15.1 10.4 15 10.3C14.9 10.2 14.8 10.2 14.7 10.2C14.6 10.2 14.5 10.2 14.4 10.3C14.3 10.4 14.3 10.5 14.2 10.6L9 19.1C8.9 19.2 8.89999 19.3 8.89999 19.4C8.89999 19.5 8.9 19.6 9 19.7C9.1 19.8 9.2 19.8 9.3 19.8C9.5 19.8 9.6 19.7 9.8 19.5L15 11.1C15 10.8 15.1 10.7 15.1 10.6ZM11 11.6C10.9 11.3 10.8 11.1 10.6 10.8C10.4 10.6 10.2 10.4 10 10.3C9.8 10.2 9.50001 10.1 9.10001 10.1C8.60001 10.1 8.3 10.2 8 10.4C7.7 10.6 7.49999 10.9 7.39999 11.2C7.29999 11.6 7.2 12 7.2 12.6C7.2 13.1 7.3 13.5 7.5 13.9C7.7 14.3 7.9 14.5 8.2 14.7C8.5 14.9 8.8 14.9 9.2 14.9C9.8 14.9 10.3 14.7 10.6 14.3C11 13.9 11.1 13.3 11.1 12.5C11.1 12.3 11.1 11.9 11 11.6ZM9.8 13.8C9.7 14.1 9.5 14.2 9.2 14.2C9 14.2 8.8 14.1 8.7 14C8.6 13.9 8.5 13.7 8.5 13.5C8.5 13.3 8.39999 13 8.39999 12.6C8.39999 12.2 8.4 11.9 8.5 11.7C8.5 11.5 8.6 11.3 8.7 11.2C8.8 11.1 9 11 9.2 11C9.5 11 9.7 11.1 9.8 11.4C9.9 11.7 10 12 10 12.6C10 13.2 9.9 13.6 9.8 13.8ZM16.5 16.1C16.4 15.8 16.3 15.6 16.1 15.4C15.9 15.2 15.7 15 15.5 14.9C15.3 14.8 15 14.7 14.6 14.7C13.9 14.7 13.4 14.9 13.1 15.3C12.8 15.7 12.6 16.3 12.6 17.1C12.6 17.6 12.7 18 12.9 18.4C13.1 18.7 13.3 19 13.6 19.2C13.9 19.4 14.2 19.5 14.6 19.5C15.2 19.5 15.7 19.3 16 18.9C16.4 18.5 16.5 17.9 16.5 17.1C16.7 16.8 16.6 16.4 16.5 16.1ZM15.3 18.4C15.2 18.7 15 18.8 14.7 18.8C14.4 18.8 14.2 18.7 14.1 18.4C14 18.1 13.9 17.7 13.9 17.2C13.9 16.8 13.9 16.5 14 16.3C14.1 16.1 14.1 15.9 14.2 15.8C14.3 15.7 14.5 15.6 14.7 15.6C15 15.6 15.2 15.7 15.3 16C15.4 16.2 15.5 16.6 15.5 17.2C15.5 17.7 15.4 18.1 15.3 18.4Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Campaigns</span>
            <span class="menu-arrow"></span>
        </span>
        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item ">
                <a class="menu-link {{ request()->routeIs('admin.campaigns.coupons.*') ? 'active' : '' }}" href="{{ route('admin.campaigns.coupons.list') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Coupons</span>
                </a>
            </div>
        </div>
    </div>

    <div class="menu-item">
        <div class="menu-content pt-8 pb-2">
            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Contents</span>
        </div>
    </div>
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
        <span class="menu-link {{ request()->routeIs('admin.contents.sliders.*') ? 'active' : '' }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M22 5V19C22 19.6 21.6 20 21 20H19.5L11.9 12.4C11.5 12 10.9 12 10.5 12.4L3 20C2.5 20 2 19.5 2 19V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5ZM7.5 7C6.7 7 6 7.7 6 8.5C6 9.3 6.7 10 7.5 10C8.3 10 9 9.3 9 8.5C9 7.7 8.3 7 7.5 7Z" fill="black" />
                        <path d="M19.1 10C18.7 9.60001 18.1 9.60001 17.7 10L10.7 17H2V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V12.9L19.1 10Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Sliders</span>
            <span class="menu-arrow"></span>
        </span>
        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('admin.contents.sliders.web') ? 'active' : '' }}" href="{{ route('admin.contents.sliders.web') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Web Sliders</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('admin.contents.sliders.app') ? 'active' : '' }}" href="{{ route('admin.contents.sliders.app') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">App Sliders</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('admin.contents.sliders.ticker') ? 'active' : '' }}" href="{{ route('admin.contents.sliders.ticker') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Ticker Tape</span>
                </a>
            </div>
        </div>
    </div>
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
        <span class="menu-link  {{ request()->routeIs('admin.contents.blogs.*') || request()->routeIs('admin.contents.news.*') || request()->routeIs('admin.contents.gallery.*') ? 'active' : '' }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="black" />
                        <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="black" />
                        <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Contents</span>
            <span class="menu-arrow"></span>
        </span>
        <div class="menu-sub menu-sub-accordion menu-active-bg ">
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('admin.contents.blogs.*') ? 'active' : '' }}" href="{{ route('admin.contents.blogs.list') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Blogs</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('admin.contents.news.*') ? 'active' : '' }}" href="{{ route('admin.contents.news.list') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">News</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('admin.contents.gallery.list') ? 'active' : '' }}" href="{{ route('admin.contents.gallery.list') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Gallery</span>
                </a>
            </div>
        </div>
    </div>
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
        <span class="menu-link {{ request()->routeIs('admin.contents.other.*') ? 'active' : '' }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M15.43 8.56949L10.744 15.1395C10.6422 15.282 10.5804 15.4492 10.5651 15.6236C10.5498 15.7981 10.5815 15.9734 10.657 16.1315L13.194 21.4425C13.2737 21.6097 13.3991 21.751 13.5557 21.8499C13.7123 21.9488 13.8938 22.0014 14.079 22.0015H14.117C14.3087 21.9941 14.4941 21.9307 14.6502 21.8191C14.8062 21.7075 14.9261 21.5526 14.995 21.3735L21.933 3.33649C22.0011 3.15918 22.0164 2.96594 21.977 2.78013C21.9376 2.59432 21.8452 2.4239 21.711 2.28949L15.43 8.56949Z" fill="black" />
                        <path opacity="0.3" d="M20.664 2.06648L2.62602 9.00148C2.44768 9.07085 2.29348 9.19082 2.1824 9.34663C2.07131 9.50244 2.00818 9.68731 2.00074 9.87853C1.99331 10.0697 2.04189 10.259 2.14054 10.4229C2.23919 10.5869 2.38359 10.7185 2.55601 10.8015L7.86601 13.3365C8.02383 13.4126 8.19925 13.4448 8.37382 13.4297C8.54839 13.4145 8.71565 13.3526 8.85801 13.2505L15.43 8.56548L21.711 2.28448C21.5762 2.15096 21.4055 2.05932 21.2198 2.02064C21.034 1.98196 20.8409 1.99788 20.664 2.06648Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Other</span>
            <span class="menu-arrow"></span>
        </span>
        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('admin.contents.other.messages.*') ? 'active' : '' }}" href="{{ route('admin.contents.other.messages.list') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Messages</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('admin.contents.other.jobresumes.*') ? 'active' : '' }}" href="{{ route('admin.contents.other.jobresumes.list') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Job Resumes</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('admin.contents.other.newsletter.list') ? 'active' : '' }}" href="{{ route('admin.contents.other.newsletter.list') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Newsletter</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('admin.contents.other.popup.list') ? 'active' : '' }}" href="{{ route('admin.contents.other.popup.list') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Popup</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('admin.contents.other.advertisement.list') ? 'active' : '' }}" href="{{ route('admin.contents.other.advertisement.list') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Advertisement</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('admin.contents.other.rss.list') ? 'active' : '' }}" href="{{ route('admin.contents.other.rss.list') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Extra RSS Feed</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('admin.contents.other.tickets.list') ? 'active' : '' }}" href="{{ route('admin.contents.other.tickets.list') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Support Tickets</span>
                </a>
            </div>
        </div>
    </div>
    <div class="menu-item">
        <div class="menu-content pt-8 pb-2">
            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Settings</span>
        </div>
    </div>
    <div class="menu-item">
        <a class="menu-link {{ request()->routeIs('admin.settings.shipping') ? 'active' : '' }}" href="{{ route('admin.settings.shipping') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M20 8H16C15.4 8 15 8.4 15 9V16H10V17C10 17.6 10.4 18 11 18H16C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18H21C21.6 18 22 17.6 22 17V13L20 8Z" fill="black" />
                        <path opacity="0.3" d="M20 18C20 19.1 19.1 20 18 20C16.9 20 16 19.1 16 18C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18ZM15 4C15 3.4 14.6 3 14 3H3C2.4 3 2 3.4 2 4V13C2 13.6 2.4 14 3 14H15V4ZM6 16C4.9 16 4 16.9 4 18C4 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Shipping</span>
        </a>
    </div>
    <div class="menu-item">
        <a class="menu-link {{ request()->routeIs('admin.settings.order_rules') ? 'active' : '' }}" href="{{ route('admin.settings.order_rules') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="black" />
                        <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="black" />
                        <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Order Rules</span>
        </a>
    </div>
    <div class="menu-item">
        <a class="menu-link {{ request()->routeIs('admin.settings.payment_method') ? 'active' : '' }}" href="{{ route('admin.settings.payment_method') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M22 7H2V11H22V7Z" fill="black" />
                        <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Payment Method</span>
        </a>
    </div>
    <div class="menu-item">
        <a class="menu-link {{ request()->routeIs('admin.settings.point_system') ? 'active' : '' }}" href="{{ route('admin.settings.point_system') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z" fill="black" />
                        <path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z" fill="black" />
                        <path opacity="0.3" d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Point System</span>
        </a>
    </div>
    <div class="menu-item">
        <a class="menu-link {{ request()->routeIs('admin.settings.general_settings') ? 'active' : '' }}" href="{{ route('admin.settings.general_settings') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="black" />
                        <path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">General Settings</span>
        </a>
    </div>
    <div class="menu-item">
        <a class="menu-link {{ request()->routeIs('admin.accounts.*') ? 'active' : '' }}" href="{{ route('admin.accounts.list') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="black" />
                        <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="black" />
                        <path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="black" />
                        <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Admin Accounts</span>
        </a>
    </div>
</div>