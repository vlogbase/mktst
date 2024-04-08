@extends('admin.layouts.templates.panel')
@section('title','Brand')
@section('sub-title','List')
@section('content')
    				<!--begin::Row-->
                    <div class="row gy-5 g-xl-8">
                        <!--begin::Col-->
                        <div class="col-xl-8 mx-auto">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Add New Brand</h3>
                                </div>
                                <div class="card-body">
                                    @livewire('admin.brand.brand-add')
                                </div>
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>

                    @livewire('admin.brand.brand-list')
@endsection
