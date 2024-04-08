@extends('admin.layouts.templates.panel')
@section('title','Brand Owner')
@section('sub-title','Edit')
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
                                    <a  class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">Edit Member</span></a>
                                    
                                </div>
                                <!--end::Name-->
                                
                                <!--begin::Info-->
                                {{-- DELETED INFO --}}
                                <!--end::Info-->
                            </div>
                            <!--end::User-->
                            <!--begin::Actions-->
                            <div class="d-flex my-4">
                                <a href="{{route('admin.sellers.edit',$seller->id)}}" class="btn btn-sm btn-primary me-3" >Back to Brand Owner</a>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Title-->
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
                    <h3 class="fw-bolder m-0">Member Details</h3>
                </div>
                <!--end::Card title-->
                <!--begin::Action-->
                {{-- <a href="../../demo1/dist/account/settings.html" class="btn btn-primary align-self-center">Edit Profile</a> --}}
                <!--end::Action-->
            </div>
            <!--begin::Card header-->
            <!--begin::Card body-->
            <div class="card-body p-9">
               @livewire('admin.seller.edit-member',['memberId'=>$member->id])
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
                                <span class="fs-4 fw-bolder pe-2">Password Change</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Heading-->
                        </div>
                        <div class="mt-5">
                            @livewire('admin.customer.edit-password',['customer' => $member]);
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Charts Widget 1-->
            </div>
            <!--end::Col-->
            
        </div>
        <!--end::Row-->

    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
@endsection