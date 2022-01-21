@extends('admin.layouts.master')
@section('body')
<body id="kt_body" class=" page-loading-enabled page-loading header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed " style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

    <!--layout-partial:layout/_loader.html-->
        @include('admin.layouts.partials._loader')
    
    <!--layout-partial:layout/master.html-->
        
        @include('admin.layouts.partials._master')
    
    <!--layout-partial:layout/engage/_main.html-->
    
    
    <!--layout-partial:layout/_scrolltop.html-->
    @include('admin.layouts.partials._scrolltop')
    
            <!--begin::Modals-->
    
    <!--layout-partial:partials/modals/_upgrade-plan.html-->
    
    
    <!--layout-partial:partials/modals/create-app/_main.html-->
    
    
    <!--layout-partial:partials/modals/_invite-friends.html-->
    
    
    <!--layout-partial:partials/modals/users-search/_main.html-->
    
            <!--end::Modals-->
            @include('admin.layouts.partials.javascripts')
            @yield('js')
        </body>
@endsection
