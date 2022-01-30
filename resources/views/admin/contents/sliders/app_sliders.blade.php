@extends('admin.layouts.templates.panel')
@section('title','App Sliders')
@section('sub-title','')
@section('content')
    	    				<!--begin::Row-->
                            <div class="row gy-5 g-xl-8">
                                <!--begin::Col-->
                                <div class="col-xl-12">
                                    <div class="card shadow-sm">
                                        <div class="card-header">
                                            <h3 class="card-title">Add New App Sliders</h3>
                                        </div>
                                        <div class="card-body">
                                            @livewire('admin.sliders.app-slider-add')
                                        </div>
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            @livewire('admin.sliders.app-slider-list')
@endsection
