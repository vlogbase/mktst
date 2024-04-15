@extends('customer.layouts.master')
@section('title','Blog Detail - Markket')
@section('content')

@include('customer.component.breadcrumb' , ['title' => 'Blog Detail'])


<!-- START MAIN CONTENT -->
<div class="main_content">


<!-- START SECTION BLOG -->
<div class="section">
	<div class="container">
    	<div class="row">
        	<div class="col-xl-9 mx-auto">
            	<div class="single_post">
                	<h2 class="blog_title">{{ $item->name}}</h2>
                    <ul class="list_none blog_meta">
                        <li class="text-secondary"><i class="ti-calendar"></i> {{$item->humanTime()}}</li>
                    </ul>
                    <div class="blog_img">
                        <img src="{{ $item->image}}" alt="{{ $item->name}}">
                    </div>
                    <div class="blog_content mt-3">
                        <div class="blog_text">
                            {!! $item->text !!}
                        </div>
                    </div>
                </div>
                <div class="post_navigation bg_gray mt-5">
                    <div class="row align-items-center justify-content-between p-4">
                        <div class="col-5">
                            @if($previous)
                            <a href="{{route('blogs.detail',$previous->slug)}}">
                                <div class="post_nav post_nav_prev">
                                    <i class="ti-arrow-left"></i>
                                    <span>{{$previous->name}}</span>
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="col-2">
                            <a href="{{route('blogs.index')}}" class="post_nav_home">
                                <i class="ti-layout-grid2"></i>
                            </a>
                        </div>
                        <div class="col-5">
                            @if($next)
                            <a href="{{route('blogs.detail',$next->slug)}}">
                                <div class="post_nav post_nav_next">
                                    <i class="ti-arrow-right"></i>
                                    <span>{{$next->name}}</span>
                                </div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BLOG -->

</div>
<!-- END MAIN CONTENT -->   
@endsection
