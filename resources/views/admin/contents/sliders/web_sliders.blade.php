@extends('admin.layouts.templates.panel')
@section('title','Web Sliders')
@section('sub-title','List')
@section('content')
    				<!--begin::Toolbar-->
                    <div class="d-flex flex-wrap flex-stack mb-6">
                        <!--begin::Heading-->
                        <h3 class="fw-bolder my-2">Web Sliders</h3>
                        <!--end::Heading-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-wrap my-2">
                            <a href="{{route('admin.contents.sliders.web_add')}}" class="btn btn-primary btn-sm" >New Web Slider</a>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Toolbar-->

                    @livewire('admin.sliders.web-slider-list')
@endsection
