@extends('admin.layouts.templates.panel')
@section('title','Advertisement Control')
@section('sub-title','List')
@section('content')
    				<!--begin::Toolbar-->
                    <div class="d-flex flex-wrap flex-stack mb-6">
                        <!--begin::Heading-->
                        <h3 class="fw-bolder my-2">Advertisement</h3>
                        <!--end::Heading-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-wrap my-2">
                            <a href="{{route('admin.contents.other.advertisement.add')}}" class="btn btn-primary btn-sm" >New Ads</a>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Toolbar-->

                    <!--begin::List-->
                    @livewire('admin.advertisement.ads-list')
                    <!--end::List-->
@endsection
