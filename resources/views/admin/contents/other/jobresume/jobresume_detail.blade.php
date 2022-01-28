@extends('admin.layouts.templates.panel')
@section('title','Job Resume')
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
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Name Surname</label>
                                        <!--begin::Label-->
                                        <!--begin::Label-->
                                        <div class="col-lg-8 fv-row">
                                            <p class="col-form-label  fs-6">{{$item->name.' '.$item->surname}}</p>
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6" >
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Email</label>
                                        <!--begin::Label-->
                                        <!--begin::Label-->
                                        <div class="col-lg-8 fv-row">
                                            <p class="col-form-label  fs-6">{{$item->email}}</p>
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6" >
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Phone</label>
                                        <!--begin::Label-->
                                        <!--begin::Label-->
                                        <div class="col-lg-8 fv-row">
                                            <p class="col-form-label  fs-6">{{$item->phone}}</p>
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6" >
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Department</label>
                                        <!--begin::Label-->
                                        <!--begin::Label-->
                                        <div class="col-lg-8 fv-row">
                                            <p class="col-form-label  fs-6">{{$item->department}}</p>
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6" >
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Message</label>
                                        <!--begin::Label-->
                                        <!--begin::Label-->
                                        <div class="col-lg-8 fv-row">
                                            <p class="col-form-label  fs-6">{{$item->message}}</p>
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6" >
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Resume</label>
                                        <!--begin::Label-->
                                        <!--begin::Label-->
                                        <div class="col-lg-8 fv-row">
                                            @if($item->resume_path != NULL)
                                            <p class="col-form-label  fs-6"><a href="{{route('admin.contents.other.jobresumes.download',$item->id)}}" class="btn  btn-light-primary">
                                                Download</a>
                                            </p>
                                            @endif
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
