@extends('admin.layouts.templates.panel')
@section('title','Tickets')
@section('sub-title','Detail')
@section('content')
    				<!--begin::Row-->
                    <div class="row gy-5 g-xl-8">
                        <!--begin::Col-->
                        <div class="col-xl-9 mx-auto">
                            <div class="card mt-5 mb-5 " id="kt_profile_details_view">
                                <!--begin::Card header-->
									<div class="card-header border-0 cursor-pointer" >
										<!--begin::Card title-->
										<div class="card-title m-0">
											<h3 class="fw-bolder m-0"><a href="{{ url()->previous() }}">Back to List</a> </h3>
										</div>
										<!--end::Card title-->
									</div>
									<!--begin::Card header-->    
                                <!--begin::Card body-->
                                <div class="card-body ">
                                    <!--begin::Input group-->
                                    <div class="row mb-6" >
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Title</label>
                                        <!--begin::Label-->
                                        <!--begin::Label-->
                                        <div class="col-lg-8 fv-row">
                                            <p class="col-form-label  fs-6">{{$item->title}}</p>
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6" >
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Urgency</label>
                                        <!--begin::Label-->
                                        <!--begin::Label-->
                                        <div class="col-lg-8 fv-row">
                                            <p class="col-form-label  fs-6">{!!$item->urgencyText()!!}</p>
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6" >
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Topic</label>
                                        <!--begin::Label-->
                                        <!--begin::Label-->
                                        <div class="col-lg-8 fv-row">
                                            <p class="col-form-label  fs-6">{{$item->topic}}</p>
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6" >
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">User</label>
                                        <!--begin::Label-->
                                        <!--begin::Label-->
                                        <div class="col-lg-8 fv-row">
                                            <p class="col-form-label  fs-6">{{$item->user->name}}</p>
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6" >
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Description</label>
                                        <!--begin::Label-->
                                        <!--begin::Label-->
                                        <div class="col-lg-8 fv-row">
                                            <p class="col-form-label  fs-6">{{$item->description}}</p>
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6" >
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Status</label>
                                        <!--begin::Label-->
                                        <!--begin::Label-->
                                        <div class="col-lg-8 fv-row">
                                            <p class="col-form-label  fs-6">{{$item->status}}</p>
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6" >
                                        <!--begin::Label-->
                                        <div class="col-lg-12 fv-row">
                                            @livewire('customer.ticket.ticket-message', ['ticket_id' => $item->id,'author' => 'admin'])
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::details View-->
                        </div>
                        <!--end::Col-->
                    </div>
@endsection
