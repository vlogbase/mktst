@extends('admin.layouts.templates.panel')
@section('title','Coupons')
@section('sub-title','List')
@section('content')
    				<!--begin::Toolbar-->
                    <div class="d-flex flex-wrap flex-stack mb-6">
                        <!--begin::Heading-->
                        <h3 class="fw-bolder my-2">Coupons List</h3>
                        <!--end::Heading-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-wrap my-2">
                            <a href="{{route('admin.campaigns.coupons.add')}}" class="btn btn-primary btn-sm" >New Coupon</a>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Toolbar-->

                    @livewire('admin.campaign.coupon.coupon-list')
@endsection
