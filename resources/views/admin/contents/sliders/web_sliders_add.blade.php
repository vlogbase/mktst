@extends('admin.layouts.templates.panel')
@section('title','Web Sliders')
@section('sub-title','Add')
@section('content')
    				<!--begin::Toolbar-->
                    <div class="d-flex flex-wrap flex-stack mb-6">
                        <!--begin::Heading-->
                        <h3 class="fw-bolder my-2">Web Sliders Add</h3>
                        <!--end::Heading-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-wrap my-2">
                            <a href="{{route('admin.contents.sliders.web')}}" class="btn btn-primary btn-sm" >Back to List</a>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Toolbar-->
                                        <!--begin::Row-->
                                        <div class="row gy-5 g-xl-8">
                                            <!--begin::Col-->
                                            <div class="col-xl-12">
                                                <!--begin::Basic info-->
                                                    <div class="card mb-5 mb-xl-10">
                                                        
                                                        <!--begin::Content-->
                                                        <div id="kt_account_profile_details" class="collapse show">
                                                            @livewire('admin.sliders.web-slider-add',['itemid' => 0])
                                                        </div>
                                                        <!--end::Content-->
                                                    </div>
                                                    <!--end::Basic info-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
@endsection
