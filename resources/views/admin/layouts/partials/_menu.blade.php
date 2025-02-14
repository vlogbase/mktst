         <!--begin::Toolbar wrapper-->
         <div class="d-flex align-items-stretch flex-shrink-0">
		@auth('admin')
         <!--begin::Notifications-->
         <div class="d-flex align-items-center ms-1 ms-lg-3">
         <!--begin::Menu- wrapper-->
         <div class="btn btn-icon btn-active-light-primary position-relative w-30px h-30px w-md-40px h-md-40px"
         data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
         <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
         <span class="svg-icon svg-icon-1">
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
         fill="none">
         <path
         d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
         fill="black" />
         <path
         d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
         fill="black" />
         <path opacity="0.3"
         d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
         fill="black" />
         <path opacity="0.3"
         d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
         fill="black" />
         </svg>
         </span>
         <!--end::Svg Icon-->
         </div>

         <!--layout-partial:layout/topbar/partials/_notifications-menu.html-->
         @include('admin.layouts.partials.topbar._notifications-menu')
         <!--end::Menu wrapper-->
         </div>
         <!--end::Notifications-->

         <!--begin::Quick links-->
         <div class="d-flex align-items-center ms-1 ms-lg-3">
         <!--begin::Menu wrapper-->
         <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
         data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
         <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
         <span class="svg-icon svg-icon-1">
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
         fill="none">
         <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
         <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
         fill="black" />
         <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
         fill="black" />
         <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
         fill="black" />
         </svg>
         </span>
         <!--end::Svg Icon-->
         </div>

         <!--layout-partial:layout/topbar/partials/_quick-links-menu.html-->
         @include('admin.layouts.partials.topbar._quick-links-menu')
         <!--end::Menu wrapper-->
         </div>
         <!--end::Quick links-->
		 @endauth

         <!--begin::User-->
         <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
         <!--begin::Menu wrapper-->
         <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
         data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
         <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
         @auth('admin')
             <div class="symbol-label fs-3 bg-light-danger text-danger">
             {{ Auth::guard('admin')->user()->name[0] }}</div>
         @endauth
         @auth('seller')
             <div class="symbol-label fs-3 bg-light-danger text-danger">
             {{ Auth::guard('seller')->user()->name[0] }}</div>
         @endauth
         </div>
         </div>

         <!--layout-partial:layout/topbar/partials/_user-menu.html-->
         @include('admin.layouts.partials.topbar._user-menu')
         <!--end::Menu wrapper-->
         </div>
         <!--end::User -->
         {{-- <!--begin::Heaeder menu toggle-->
										<div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
											<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
												<!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
												<span class="svg-icon svg-icon-1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z" fill="black" />
														<path opacity="0.3" d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Heaeder menu toggle--> --}}
         </div>
         <!--end::Toolbar wrapper-->
