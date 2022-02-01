											
											<!--begin::Menu-->
											<div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px" data-kt-menu="true">
												<!--begin::Heading-->
												<div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10" style="background-image:url('/assets/media/misc/pattern-1.jpg')">
													<!--begin::Title-->
													<h3 class="text-white fw-bold mb-3">Quick Links</h3>
													<!--end::Title-->
													{{-- <!--begin::Status-->
													<span class="badge bg-primary py-2 px-3">25 pending tasks</span>
													<!--end::Status--> --}}
												</div>
												<!--end::Heading-->
												<!--begin:Nav-->
												<div class="row g-0">
													<!--begin:Item-->
													<div class="col-6">
														<a href="{{route('admin.orders.list')}}" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
															<!--begin::Svg Icon | path: icons/duotune/finance/fin009.svg-->
															<span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="black"/>
																	<path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="black"/>
																	<path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="black"/>
																	</svg>
															</span>
															<!--end::Svg Icon-->
															<span class="fs-5 fw-bold text-gray-800 mb-0">Orders</span>
															<span class="fs-7 text-gray-400">eCommerce</span>
														</a>
													</div>
													<!--end:Item-->
													<!--begin:Item-->
													<div class="col-6">
														<a href="{{route('admin.contents.other.messages.list')}}" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-bottom">
															<!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
															<span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="black" />
																	<path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="black" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<span class="fs-5 fw-bold text-gray-800 mb-0">Messages</span>
															<span class="fs-7 text-gray-400">Contents</span>
														</a>
													</div>
													<!--end:Item-->
													<!--begin:Item-->
													<div class="col-6">
														<a href="{{route('admin.products.list')}}" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end">
															<!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
															<span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M5 8.04999L11.8 11.95V19.85L5 15.85V8.04999Z" fill="black"/>
																	<path d="M20.1 6.65L12.3 2.15C12 1.95 11.6 1.95 11.3 2.15L3.5 6.65C3.2 6.85 3 7.15 3 7.45V16.45C3 16.75 3.2 17.15 3.5 17.25L11.3 21.75C11.5 21.85 11.6 21.85 11.8 21.85C12 21.85 12.1 21.85 12.3 21.75L20.1 17.25C20.4 17.05 20.6 16.75 20.6 16.45V7.45C20.6 7.15 20.4 6.75 20.1 6.65ZM5 15.85V7.95L11.8 4.05L18.6 7.95L11.8 11.95V19.85L5 15.85Z" fill="black"/>
																	</svg>
															</span>
															<!--end::Svg Icon-->
															<span class="fs-5 fw-bold text-gray-800 mb-0">Products</span>
															<span class="fs-7 text-gray-400">eCommerce</span>
														</a>
													</div>
													<!--end:Item-->
													<!--begin:Item-->
													<div class="col-6">
														<a href="{{route('admin.customers.list')}}" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light">
															<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
															<span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black" />
																	<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<span class="fs-5 fw-bold text-gray-800 mb-0">Customers</span>
															<span class="fs-7 text-gray-400">eCommerce</span>
														</a>
													</div>
													<!--end:Item-->
												</div>
												<!--end:Nav-->
												{{-- <!--begin::View more-->
												<div class="py-2 text-center border-top">
													<a href="?page=pages/profile/activity" class="btn btn-color-gray-600 btn-active-color-primary">View All
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
													<span class="svg-icon svg-icon-5">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
															<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon--></a>
												</div>
												<!--end::View more--> --}}
											</div>
											<!--end::Menu-->
											