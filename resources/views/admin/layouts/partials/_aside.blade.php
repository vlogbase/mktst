      <!--begin::Aside Menu-->
      <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
          data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
          data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
          data-kt-scroll-offset="0">
          <!--begin::Menu-->
          @auth('admin')
              @include('admin.layouts.partials._admin-left-menu')
          @endauth
          @auth('seller')
              @include('admin.layouts.partials._seller-left-menu')
          @endauth
      </div>
      <!--end::Aside Menu-->
