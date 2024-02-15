@extends('admin.layouts.templates.panel')
@section('title','RSS')
@section('sub-title','List')
@section('content')
    				<!--begin::Row-->
                    <div class="row gy-5 g-xl-8">
                        <!--begin::Col-->
                        <div class="col-xl-8 mx-auto">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h3 class="card-title">Add New RSS</h3>
                                </div>
                                <div class="card-body">
                                    @livewire('admin.feed.add-feed')
                                </div>
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>

                    @livewire('admin.feed.feed-list')
@endsection
