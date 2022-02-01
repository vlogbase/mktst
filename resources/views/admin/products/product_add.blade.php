@extends('admin.layouts.templates.panel')
@section('title','Product')
@section('sub-title','Add')
@section('content')
<!--begin::Toolbar-->
<div class="d-flex flex-wrap flex-stack mb-6">
    <!--begin::Heading-->
    <h3 class="fw-bolder my-2">Product Add</h3>
    <!--end::Heading-->
    <!--begin::Actions-->
    <div class="d-flex flex-wrap my-2">
        <a href="{{route('admin.products.list')}}" class="btn btn-primary btn-sm" >Back to List</a>
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
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details1" aria-expanded="true" aria-controls="kt_account_profile_details1">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Base Detail Of Product</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_profile_details1" class="collapse show">
                    @livewire('admin.product.product-base-details',['itemid' => 0])
                </div>
                <!--end::Content-->
            </div>
            <!--end::Basic info-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
@endsection
