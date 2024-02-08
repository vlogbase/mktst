@extends('admin.layouts.templates.panel')
@section('title','Customer')
@section('sub-title','Detail')
@section('content')
    				<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Navbar-->
								<div class="card mb-5 mb-xl-10">
									<div class="card-body pt-9 pb-0">
										<!--begin::Details-->
										<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
											<!--begin::Info-->
											<div class="flex-grow-1">
												<!--begin::Title-->
												<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
													<!--begin::User-->
													<div class="d-flex flex-column">
														<!--begin::Name-->
														<div class="d-flex align-items-center mb-2">
															<a  class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{$customer->name}} - <span class="text-muted">{{$customer->userdetail->business_type}}</span></a>
                                                            
                                                            
                                                            @if($customer->email_verified_at != NULL)
															<a >
																<!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-primary">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
																		<path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
																		<path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</a>
                                                            @endif
															
														</div>
														<!--end::Name-->
                                                        
														<!--begin::Info-->
														{{-- DELETED INFO --}}
														<!--end::Info-->
													</div>
													<!--end::User-->
													<!--begin::Actions-->
													<div class="d-flex my-4">
														@livewire('admin.customer.delete-button',['itemid'=> $customer->id])
														<a href="{{route('admin.customers.edit',$customer->id)}}" class="btn btn-sm btn-secondary me-3" >Edit</a>
														<a href="{{route('admin.customers.list')}}" class="btn btn-sm btn-primary me-3" >Back to List</a>
														
													</div>
													<!--end::Actions-->
												</div>
												<!--end::Title-->
												<!--begin::Stats-->
												<div class="d-flex flex-wrap flex-stack">
													<!--begin::Wrapper-->
													<div class="d-flex flex-column flex-grow-1 pe-8">
														<!--begin::Stats-->
														<div class="d-flex flex-wrap">
															<!--begin::Stat-->
															<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
																<!--begin::Number-->
																<div class="d-flex align-items-center">
																	<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
																	<span class="svg-icon svg-icon-3 svg-icon-success me-2">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path opacity="0.3" d="M12.5 22C11.9 22 11.5 21.6 11.5 21V3C11.5 2.4 11.9 2 12.5 2C13.1 2 13.5 2.4 13.5 3V21C13.5 21.6 13.1 22 12.5 22Z" fill="black"/>
                                                                            <path d="M17.8 14.7C17.8 15.5 17.6 16.3 17.2 16.9C16.8 17.6 16.2 18.1 15.3 18.4C14.5 18.8 13.5 19 12.4 19C11.1 19 10 18.7 9.10001 18.2C8.50001 17.8 8.00001 17.4 7.60001 16.7C7.20001 16.1 7 15.5 7 14.9C7 14.6 7.09999 14.3 7.29999 14C7.49999 13.8 7.80001 13.6 8.20001 13.6C8.50001 13.6 8.69999 13.7 8.89999 13.9C9.09999 14.1 9.29999 14.4 9.39999 14.7C9.59999 15.1 9.8 15.5 10 15.8C10.2 16.1 10.5 16.3 10.8 16.5C11.2 16.7 11.6 16.8 12.2 16.8C13 16.8 13.7 16.6 14.2 16.2C14.7 15.8 15 15.3 15 14.8C15 14.4 14.9 14 14.6 13.7C14.3 13.4 14 13.2 13.5 13.1C13.1 13 12.5 12.8 11.8 12.6C10.8 12.4 9.99999 12.1 9.39999 11.8C8.69999 11.5 8.19999 11.1 7.79999 10.6C7.39999 10.1 7.20001 9.39998 7.20001 8.59998C7.20001 7.89998 7.39999 7.19998 7.79999 6.59998C8.19999 5.99998 8.80001 5.60005 9.60001 5.30005C10.4 5.00005 11.3 4.80005 12.3 4.80005C13.1 4.80005 13.8 4.89998 14.5 5.09998C15.1 5.29998 15.6 5.60002 16 5.90002C16.4 6.20002 16.7 6.6 16.9 7C17.1 7.4 17.2 7.69998 17.2 8.09998C17.2 8.39998 17.1 8.7 16.9 9C16.7 9.3 16.4 9.40002 16 9.40002C15.7 9.40002 15.4 9.29995 15.3 9.19995C15.2 9.09995 15 8.80002 14.8 8.40002C14.6 7.90002 14.3 7.49995 13.9 7.19995C13.5 6.89995 13 6.80005 12.2 6.80005C11.5 6.80005 10.9 7.00005 10.5 7.30005C10.1 7.60005 9.79999 8.00002 9.79999 8.40002C9.79999 8.70002 9.9 8.89998 10 9.09998C10.1 9.29998 10.4 9.49998 10.6 9.59998C10.8 9.69998 11.1 9.90002 11.4 9.90002C11.7 10 12.1 10.1 12.7 10.3C13.5 10.5 14.2 10.7 14.8 10.9C15.4 11.1 15.9 11.4 16.4 11.7C16.8 12 17.2 12.4 17.4 12.9C17.6 13.4 17.8 14 17.8 14.7Z" fill="black"/>
                                                                            </svg>
																	</span>
																	<!--end::Svg Icon-->
																	<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$customer->userorders->sum('total_price')}}" data-kt-countup-prefix="£">0</div>
																</div>
																<!--end::Number-->
																<!--begin::Label-->
																<div class="fw-bold fs-6 text-gray-400">Spent</div>
																<!--end::Label-->
															</div>
															<!--end::Stat-->
															<!--begin::Stat-->
															<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
																<!--begin::Number-->
																<div class="d-flex align-items-center">
																	<!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
																	<span class="svg-icon svg-icon-3 svg-icon-danger me-2">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path opacity="0.3" d="M20 22H4C3.4 22 3 21.6 3 21V2H21V21C21 21.6 20.6 22 20 22Z" fill="black"/>
                                                                            <path d="M12 14C9.2 14 7 11.8 7 9V5C7 4.4 7.4 4 8 4C8.6 4 9 4.4 9 5V9C9 10.7 10.3 12 12 12C13.7 12 15 10.7 15 9V5C15 4.4 15.4 4 16 4C16.6 4 17 4.4 17 5V9C17 11.8 14.8 14 12 14Z" fill="black"/>
                                                                        </svg>
																	</span>
																	<!--end::Svg Icon-->
																	<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$customer->userorders->count()}}">0</div>
																</div>
																<!--end::Number-->
																<!--begin::Label-->
																<div class="fw-bold fs-6 text-gray-400">Order</div>
																<!--end::Label-->
															</div>
															<!--end::Stat-->
															<!--begin::Stat-->
															<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
																<!--begin::Number-->
																<div class="d-flex align-items-center">
																	<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
																	<span class="svg-icon svg-icon-3 svg-icon-info me-2">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path opacity="0.3" d="M21.6 11.2L19.3 8.89998V5.59993C19.3 4.99993 18.9 4.59993 18.3 4.59993H14.9L12.6 2.3C12.2 1.9 11.6 1.9 11.2 2.3L8.9 4.59993H5.6C5 4.59993 4.6 4.99993 4.6 5.59993V8.89998L2.3 11.2C1.9 11.6 1.9 12.1999 2.3 12.5999L4.6 14.9V18.2C4.6 18.8 5 19.2 5.6 19.2H8.9L11.2 21.5C11.6 21.9 12.2 21.9 12.6 21.5L14.9 19.2H18.2C18.8 19.2 19.2 18.8 19.2 18.2V14.9L21.5 12.5999C22 12.1999 22 11.6 21.6 11.2Z" fill="black"/>
                                                                            <path d="M11.3 9.40002C11.3 10.2 11.1 10.9 10.7 11.3C10.3 11.7 9.8 11.9 9.2 11.9C8.8 11.9 8.40001 11.8 8.10001 11.6C7.80001 11.4 7.50001 11.2 7.40001 10.8C7.20001 10.4 7.10001 10 7.10001 9.40002C7.10001 8.80002 7.20001 8.4 7.30001 8C7.40001 7.6 7.7 7.29998 8 7.09998C8.3 6.89998 8.7 6.80005 9.2 6.80005C9.5 6.80005 9.80001 6.9 10.1 7C10.4 7.1 10.6 7.3 10.8 7.5C11 7.7 11.1 8.00005 11.2 8.30005C11.3 8.60005 11.3 9.00002 11.3 9.40002ZM10.1 9.40002C10.1 8.80002 10 8.39998 9.90001 8.09998C9.80001 7.79998 9.6 7.70007 9.2 7.70007C9 7.70007 8.8 7.80002 8.7 7.90002C8.6 8.00002 8.50001 8.2 8.40001 8.5C8.40001 8.7 8.30001 9.10002 8.30001 9.40002C8.30001 9.80002 8.30001 10.1 8.40001 10.4C8.40001 10.6 8.5 10.8 8.7 11C8.8 11.1 9 11.2001 9.2 11.2001C9.5 11.2001 9.70001 11.1 9.90001 10.8C10 10.4 10.1 10 10.1 9.40002ZM14.9 7.80005L9.40001 16.7001C9.30001 16.9001 9.10001 17.1 8.90001 17.1C8.80001 17.1 8.70001 17.1 8.60001 17C8.50001 16.9 8.40001 16.8001 8.40001 16.7001C8.40001 16.6001 8.4 16.5 8.5 16.4L14 7.5C14.1 7.3 14.2 7.19998 14.3 7.09998C14.4 6.99998 14.5 7 14.6 7C14.7 7 14.8 6.99998 14.9 7.09998C15 7.19998 15 7.30002 15 7.40002C15.2 7.30002 15.1 7.50005 14.9 7.80005ZM16.6 14.2001C16.6 15.0001 16.4 15.7 16 16.1C15.6 16.5 15.1 16.7001 14.5 16.7001C14.1 16.7001 13.7 16.6 13.4 16.4C13.1 16.2 12.8 16 12.7 15.6C12.5 15.2 12.4 14.8001 12.4 14.2001C12.4 13.3001 12.6 12.7 12.9 12.3C13.2 11.9 13.7 11.7001 14.5 11.7001C14.8 11.7001 15.1 11.8 15.4 11.9C15.7 12 15.9 12.2 16.1 12.4C16.3 12.6 16.4 12.9001 16.5 13.2001C16.6 13.4001 16.6 13.8001 16.6 14.2001ZM15.4 14.1C15.4 13.5 15.3 13.1 15.2 12.9C15.1 12.6 14.9 12.5 14.5 12.5C14.3 12.5 14.1 12.6001 14 12.7001C13.9 12.8001 13.8 13.0001 13.7 13.2001C13.6 13.4001 13.6 13.8 13.6 14.1C13.6 14.7 13.7 15.1 13.8 15.4C13.9 15.7 14.1 15.8 14.5 15.8C14.8 15.8 15 15.7 15.2 15.4C15.3 15.2 15.4 14.7 15.4 14.1Z" fill="black"/>
                                                                            </svg>
																	</span>
																	<!--end::Svg Icon-->
																	<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$customer->point}}" >0</div>
																</div>
																<!--end::Number-->
																<!--begin::Label-->
																<div class="fw-bold fs-6 text-gray-400">Point</div>
																<!--end::Label-->
															</div>
															<!--end::Stat-->
														</div>
														<!--end::Stats-->
													</div>
													<!--end::Wrapper-->
													<!--begin::Progress-->
													<div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
														
                                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
															<span class="fw-bold fs-6 text-gray-400">Created Date</span>
															<span class="fw-bolder fs-6">{{\Carbon\Carbon::parse($customer->created_at)->diffForHumans()}}</span>
														</div>
                                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
															<span class="fw-bold fs-6 text-gray-400">Last Order Date</span>
															<span class="fw-bolder fs-6">{{\Carbon\Carbon::parse($customer->userorders->max('created_at'))->diffForHumans()}}</span>
														</div>
													</div>
													<!--end::Progress-->
												</div>
												<!--end::Stats-->
											</div>
											<!--end::Info-->
										</div>
										<!--end::Details-->
										
									</div>
								</div>
								<!--end::Navbar-->
								<!--begin::details View-->
								<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
									<!--begin::Card header-->
									<div class="card-header cursor-pointer">
										<!--begin::Card title-->
										<div class="card-title m-0">
											<h3 class="fw-bolder m-0">Customer Details</h3>
										</div>
										<!--end::Card title-->
										<!--begin::Action-->
										{{-- <a href="../../demo1/dist/account/settings.html" class="btn btn-primary align-self-center">Edit Profile</a> --}}
										<!--end::Action-->
									</div>
									<!--begin::Card header-->
									<!--begin::Card body-->
									<div class="card-body p-9">
										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-bold text-muted">Company Name</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<span class="fw-bold text-gray-800 fs-6">{{$customer->name}}</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
                                        <!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-bold text-muted">Company Vat</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<span class="fw-bold text-gray-800 fs-6">{{$customer->vat}}</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
                                        <!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-bold text-muted">Company Registeration</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<span class="fw-bold text-gray-800 fs-6">{{$customer->registeration}}</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-7">
											<!--begin::Label-->
											<label class="col-lg-4 fw-bold text-muted">Registered Email
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email must be active"></i></label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 d-flex align-items-center">
												<span class="fw-bolder fs-6 text-gray-800 me-2">{{$customer->email}}</span>
                                                @if($customer->email_verified_at != NULL)
												<span class="badge badge-success">Verified</span>
                                                @endif
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
									</div>
									<!--end::Card body-->
								</div>
								<!--end::details View-->
								<!--begin::Row-->
								<div class="row gy-5 g-xl-10">
									<!--begin::Col-->
									<div class="col-xl-12">
										<!--begin::Charts Widget 1-->
										<div class="card card-xl-stretch mb-xl-10">
											
											<!--begin::Body-->
											<div class="card-body">
                                                <div id="kt_carousel_1_carousel" class="carousel carousel-custom slide" data-bs-ride="carousel" data-bs-interval="8000">
                                                    <!--begin::Heading-->
                                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                        <!--begin::Label-->
                                                        <span class="fs-4 fw-bolder pe-2">Offices <span class="text-muted fw-bold fs-7">{{$customer->useroffices->count()}} Record</span></span>
                                                        <!--end::Label-->
                                                
                                                        <!--begin::Carousel Indicators-->
                                                        <ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
                                                            @for($i = 0; $i < $customer->useroffices->count(); $i++)
                                                            <li data-bs-target="#kt_carousel_1_carousel" data-bs-slide-to="{{$i}}" class="ms-1 {{$i == 0 ? 'active' : ''}}"></li>
                                                            @endfor
                                                        </ol>
                                                        <!--end::Carousel Indicators-->
                                                    </div>
                                                    <!--end::Heading-->
                                                
                                                    <!--begin::Carousel-->
                                                    <div class="carousel-inner pt-8">
                                                        @foreach($customer->useroffices as $office)
                                                        <!--begin::Item-->
                                                        <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}}">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                     <!--begin::Input group-->
                                                                     <div class="row mb-7">
                                                                         <!--begin::Label-->
                                                                         <label class="col-lg-4 fw-bold text-muted">Office Name</label>
                                                                         <!--end::Label-->
                                                                         <!--begin::Col-->
                                                                         <div class="col-lg-8">
                                                                             <span class="fw-bolder fs-6 text-gray-800">{{$office->office_name}}</span>
                                                                         </div>
                                                                         <!--end::Col-->
                                                                     </div>
                                                                     <!--end::Input group-->
                                                                     <!--begin::Input group-->
                                                                     <div class="row mb-7">
                                                                         <!--begin::Label-->
                                                                         <label class="col-lg-4 fw-bold text-muted">Office Country</label>
                                                                         <!--end::Label-->
                                                                         <!--begin::Col-->
                                                                         <div class="col-lg-8">
                                                                             <span class="fw-bolder fs-6 text-gray-800">{{$office->address->country}}</span>
                                                                         </div>
                                                                         <!--end::Col-->
                                                                     </div>
                                                                     <!--end::Input group-->
                                                                     <!--begin::Input group-->
                                                                     <div class="row mb-7">
                                                                         <!--begin::Label-->
                                                                         <label class="col-lg-4 fw-bold text-muted">Office District</label>
                                                                         <!--end::Label-->
                                                                         <!--begin::Col-->
                                                                         <div class="col-lg-8">
                                                                             <span class="fw-bolder fs-6 text-gray-800">{{$office->address->district}}</span>
                                                                         </div>
                                                                         <!--end::Col-->
                                                                     </div>
                                                                     <!--end::Input group-->
                                                                     <!--begin::Input group-->
                                                                     <div class="row mb-7">
                                                                         <!--begin::Label-->
                                                                         <label class="col-lg-4 fw-bold text-muted">Office County</label>
                                                                         <!--end::Label-->
                                                                         <!--begin::Col-->
                                                                         <div class="col-lg-8">
                                                                             <span class="fw-bolder fs-6 text-gray-800">{{$office->address->county}}</span>
                                                                         </div>
                                                                         <!--end::Col-->
                                                                     </div>
                                                                     <!--end::Input group-->
                                                                     <!--begin::Input group-->
                                                                     <div class="row mb-7">
                                                                         <!--begin::Label-->
                                                                         <label class="col-lg-4 fw-bold text-muted">Office Postcode</label>
                                                                         <!--end::Label-->
                                                                         <!--begin::Col-->
                                                                         <div class="col-lg-8">
                                                                             <span class="fw-bolder fs-6 text-gray-800">{{$office->address->postcode}}</span>
                                                                         </div>
                                                                         <!--end::Col-->
                                                                     </div>
                                                                     <!--end::Input group-->
                                                                     <!--begin::Input group-->
                                                                     <div class="row mb-7">
                                                                         <!--begin::Label-->
                                                                         <label class="col-lg-4 fw-bold text-muted">Office Address</label>
                                                                         <!--end::Label-->
                                                                         <!--begin::Col-->
                                                                         <div class="col-lg-8">
                                                                             <span class="fw-bolder fs-6 text-gray-800">{{$office->address->formatted_address}}</span>
                                                                         </div>
                                                                         <!--end::Col-->
                                                                     </div>
                                                                     <!--end::Input group-->
                                                                 <!--begin::Input group-->
                                                                 <div class="row mb-7">
                                                                     <!--begin::Label-->
                                                                     <label class="col-lg-4 fw-bold text-muted">Office Latitude & Longitude</label>
                                                                     <!--end::Label-->
                                                                     <!--begin::Col-->
                                                                     <div class="col-lg-8">
                                                                         <span class="fw-bolder fs-6 text-gray-800">{{$office->address->latitude}} & {{$office->address->longitude}}</span>
                                                                     </div>
                                                                     <!--end::Col-->
                                                                 </div>
                                                                 <!--end::Input group-->
                                                                </div>
                                                                <div class="col-md-4">
                                                                     <!--begin::Input group-->
                                                                 <div class="row mb-7">
                                                                     <!--begin::Label-->
                                                                     <label class="col-lg-4 fw-bold text-muted">Name Surname</label>
                                                                     <!--end::Label-->
                                                                     <!--begin::Col-->
                                                                     <div class="col-lg-8 fv-row">
                                                                         <span class="fw-bold text-gray-800 fs-6">{{$office->name}} {{$office->surname}}</span>
                                                                     </div>
                                                                     <!--end::Col-->
                                                                 </div>
                                                                 <!--end::Input group-->
                                                                 <!--begin::Input group-->
                                                                 <div class="row mb-7">
                                                                     <!--begin::Label-->
                                                                     <label class="col-lg-4 fw-bold text-muted">Mobile</label>
                                                                     <!--end::Label-->
                                                                     <!--begin::Col-->
                                                                     <div class="col-lg-8">
                                                                         <span class="fw-bolder fs-6 text-gray-800">{{$office->email}}</span>
                                                                     </div>
                                                                     <!--end::Col-->
                                                                 </div>
                                                                 <!--end::Input group-->
                                                                 <!--begin::Input group-->
                                                                 <div class="row mb-7">
                                                                     <!--begin::Label-->
                                                                     <label class="col-lg-4 fw-bold text-muted">Mobile</label>
                                                                     <!--end::Label-->
                                                                     <!--begin::Col-->
                                                                     <div class="col-lg-8">
                                                                         <span class="fw-bolder fs-6 text-gray-800">{{$office->mobile}}</span>
                                                                     </div>
                                                                     <!--end::Col-->
                                                                 </div>
                                                                 <!--end::Input group-->
                                                                 <!--begin::Input group-->
                                                                 <div class="row mb-7">
                                                                     <!--begin::Label-->
                                                                     <label class="col-lg-4 fw-bold text-muted">Phone</label>
                                                                     <!--end::Label-->
                                                                     <!--begin::Col-->
                                                                     <div class="col-lg-8">
                                                                         <span class="fw-bolder fs-6 text-gray-800">{{$office->phone}}</span>
                                                                     </div>
                                                                     <!--end::Col-->
                                                                 </div>
                                                                 <!--end::Input group-->
                                                                  <!--begin::Input group-->
                                                                  <div class="row mb-7">
                                                                     <!--begin::Label-->
                                                                     <label class="col-lg-4 fw-bold text-muted">Address Type</label>
                                                                     <!--end::Label-->
                                                                     <!--begin::Col-->
                                                                     <div class="col-lg-8">
                                                                         <span class="fw-bolder fs-6 text-gray-800">{{$office->is_billing ? 'Main' : 'Extra'}}</span>
                                                                     </div>
                                                                     <!--end::Col-->
                                                                 </div>
                                                                 <!--end::Input group-->
                                                                  <!--begin::Input group-->
                                                                  <div class="row mb-7">
                                                                     <!--begin::Label-->
                                                                     <label class="col-lg-4 fw-bold text-muted">Default</label>
                                                                     <!--end::Label-->
                                                                     <!--begin::Col-->
                                                                     <div class="col-lg-8">
                                                                         <span class="fw-bolder fs-6 text-gray-800">{{$office->is_shipping ? 'Yes' : 'No'}}</span>
                                                                     </div>
                                                                     <!--end::Col-->
                                                                 </div>
                                                                 <!--end::Input group-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Item-->
                                                        @endforeach   
                                                        
                                                    </div>
                                                    <!--end::Carousel-->
                                                </div>
                                               
											</div>
											<!--end::Body-->
										</div>
										<!--end::Charts Widget 1-->
									</div>
									<!--end::Col-->
									
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row gy-5 gx-xl-10">
									<!--begin::Col-->
									<div class="col-xl-6">
										<!--begin::Tables Widget 1-->
										<div class="card card-xl-stretch mb-5 mb-xl-10">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder fs-3 mb-1">Customer Orders</span>
													<span class="text-muted fw-bold fs-7">{{$customer->userorders->count()}} Orders</span>
												</h3>
												
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body py-3">
												@livewire('admin.customer.order-list',['userid' => $customer->id])
											</div>
										</div>
										<!--endW::Tables Widget 1-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-6">
										<!--begin::Tables Widget 1-->
										<div class="card card-xl-stretch mb-5 mb-xl-10">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder fs-3 mb-1">Customer Favorites</span>
													<span class="text-muted fw-bold fs-7">{{$customer->userfavorites->count()}} Favorites</span>
												</h3>
												
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body py-3">
												@livewire('admin.customer.favorite-list',['user' => $customer])
											</div>
										</div>
										<!--endW::Tables Widget 1-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
@endsection
