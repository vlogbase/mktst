@extends('admin.layouts.templates.panel')
@section('title','Gallery')
@section('sub-title','List')
@section('content')
    				<!--begin::Row-->
                    <div class="row gy-5 g-xl-8">
                        <!--begin::Col-->
                        <div class="col-xl-12">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Add New Images</h3>
                                </div>
                                <div class="card-body">
                                    @livewire('admin.contents.gallery-add')
                                </div>
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    @livewire('admin.contents.gallery-list')
@endsection
