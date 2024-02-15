@extends('admin.layouts.templates.panel')
@section('title','Edit Advertisement')
@section('sub-title','Edit')
@section('content')
    				<!--begin::Row-->
                    <div class="row gy-5 g-xl-8">
                        <!--begin::Col-->
                        <div class="col-xl-8 mx-auto">
                            <div class="card shadow-sm">
                                <div class="card-header d-flex flex-wrap flex-stack ">
                                    <h3 class="card-title">Edit Advertisement</h3>
                                    <div class="my-2">
                                        <a href="{{route('admin.contents.other.advertisement.list')}}" class="btn btn-primary btn-sm" >Back to List</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                   @livewire('admin.advertisement.ads-edit',['advert'=>$advert])
                                </div>
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    
@endsection
