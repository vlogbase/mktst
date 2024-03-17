           <!--begin::Menu-->
           <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
               data-kt-menu="true">
               <!--begin::Menu item-->
               <div class="menu-item px-3">
                   <div class="menu-content d-flex align-items-center px-3">
                       <!--begin::Avatar-->
                       <div class="symbol symbol-50px me-5">
                           <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                               @auth('admin')
                                   <div class="symbol-label fs-3 bg-light-danger text-danger">
                                       {{ Auth::guard('admin')->user()->name[0] }}
                                    </div>
                               @endauth
                               @auth('seller')
                                   <div class="symbol-label fs-3 bg-light-danger text-danger">
                                       {{ Auth::guard('seller')->user()->name[0] }}
                                    </div>
                               @endauth
                           </div>
                       </div>
                       <!--end::Avatar-->
                       
                       <!--begin::Username-->
                       @auth('admin')
                           <div class="d-flex flex-column">
                               <div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::guard('admin')->user()->name }}
                                   <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">
                                       {{ Auth::guard('admin')->user()->is_master ? 'Master' : 'Worker' }}
                                   </span>
                               </div>

                           </div>
                       @endauth
                       @auth('seller')
                           <div class="d-flex flex-column">
                               <div class="fw-bolder d-flex align-items-center fs-5">
                                   {{ Auth::guard('seller')->user()->name }}
                               </div>
                           </div>
                           <!--end::Username-->
                       @endauth
                   </div>

               </div>
               <!--end::Menu item-->
               <!--begin::Menu separator-->
               <div class="separator my-2"></div>
               <!--end::Menu separator-->

               <!--begin::Menu item-->

               <div class="menu-item px-5 my-1">
                   @auth('seller')
                       <a href="{{ route('seller.settings') }}" class="menu-link px-5">Account Settings</a>
                   @endauth
               </div>

               <!--end::Menu item-->


               <!--begin::Menu item-->
               <div class="menu-item px-5">
                   @auth('admin')
                       <form method="POST" action="{{ route('admin.logout') }}">
                           {{ csrf_field() }}
                           <a href="?page=authentication/flows/basic/sign-in"
                               onclick="event.preventDefault();
													  this.closest('form').submit();"
                               class="menu-link px-5">Sign Out</a>
                       </form>
                   @endauth
                   @auth('seller')
                       <form method="POST" action="{{ route('seller.logout') }}">
                           {{ csrf_field() }}
                           <a href="?page=authentication/flows/basic/sign-in"
                               onclick="event.preventDefault();
													  this.closest('form').submit();"
                               class="menu-link px-5">Sign Out</a>
                       </form>
                   @endauth
               </div>
               <!--end::Menu item-->
           </div>
           <!--end::Menu-->
