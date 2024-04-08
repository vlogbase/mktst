@extends('admin.layouts.templates.panel')
@section('title', 'Team')
@section('sub-title', 'List')
@section('content')
    <!--begin::Row-->
    <div class="row gy-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-xl-12">
            <!--begin::Charts Widget 1-->
            <div class="card card-xl-stretch mb-xl-10">

                <!--begin::Body-->
                <div class="card-body">
                    <div id="kt_carousel_1_carousel" class="carousel carousel-custom slide" data-bs-ride="carousel"
                        data-bs-interval="8000">
                        <!--begin::Heading-->
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <!--begin::Label-->
                            <span class="fs-4 fw-bolder pe-2">Member Craete</span>
                            <!--end::Label-->
                            <div class="d-flex flex-wrap my-2">
                                <a href="{{ route('seller.team.list') }}" class="btn btn-primary btn-sm">Back to List</a>
                            </div>
                        </div>
                        <!--end::Heading-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Charts Widget 1-->
        </div>
        <!--end::Col-->
    </div>


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
            @livewire('admin.seller.create-member',['sellerId'=>$sellerDetail->id])
        </div>
        <!--end::Card body-->
    </div>
    <!--end::details View-->


@endsection
