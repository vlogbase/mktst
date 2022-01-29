@extends('admin.layouts.templates.panel')
@section('title','News')
@section('sub-title','List')
@section('content')
    				<!--begin::Toolbar-->
                    <div class="d-flex flex-wrap flex-stack mb-6">
                        <!--begin::Heading-->
                        <h3 class="fw-bolder my-2">News</h3>
                        <!--end::Heading-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-wrap my-2">
                            <a href="{{route('admin.contents.news.add')}}" class="btn btn-primary btn-sm" >New News</a>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Toolbar-->

                    @livewire('admin.contents.blog-list',['list'=>'news'])
                            
@endsection
