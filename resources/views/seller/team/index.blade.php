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
                    <div id="kt_carousel_1_carousel" class="carousel carousel-custom slide" data-bs-ride="carousel" data-bs-interval="8000">
                        <!--begin::Heading-->
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <!--begin::Label-->
                            <span class="fs-4 fw-bolder pe-2">Brand Owner Team</span>
                            <!--end::Label-->
                            <div class="d-flex flex-wrap my-2">
                                <a href="{{ route('seller.team.memberCreate') }}" class="btn btn-primary btn-sm">Add Team Member</a>
                            </div>
                        </div>
                        <!--end::Heading-->
                    </div>
                    <div class="mt-5">
                        @livewire('admin.seller.team-list',['seller' => $sellerDetail]);
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Charts Widget 1-->
        </div>
        <!--end::Col-->
@endsection
