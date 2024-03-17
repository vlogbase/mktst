<div class="menu-item">
    <div class="menu-content pb-2">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
    </div>
</div>
<div class="menu-item">
    <a class="menu-link {{request()->routeIs('seller.dashboard') ? 'active' : ''}}" href="{{route('seller.dashboard')}}">
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