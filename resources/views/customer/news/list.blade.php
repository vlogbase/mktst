@extends('customer.layouts.master')
@section('title','items - SavoyFoods')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>items</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Contents</li>
                    <li class="breadcrumb-item active">items</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->


<!-- START MAIN CONTENT -->
<div class="main_content">


<!-- START SECTION BLOG -->
<div class="section">
	<div class="container">
        <div class="row">
            @foreach ($items as $item)
            <div class="col-lg-4 col-md-6">
            	<div class="blog_post blog_style1 box_shadow1">
                	<div class="blog_img">
                        <a href="{{route('news.detail',$item->slug)}}">
                            <img src="{{$item->image}}" alt="{{$item->name}}">
                        </a>
                    </div>
                    <div class="blog_content bg-white">
                    	<div class="blog_text">
                            <h5 class="blog_title"><a href="{{route('news.detail',$item->slug)}}">{{$item->name}}</a></h5>
                            <ul class="list_none blog_meta">
                                <li class="text-secondary"><i class="ti-calendar"></i> {{$item->humanTime()}}</li>
                                
                            </ul>
                            <p>{{substr($item->text, 0, 150).'...'}}</p>
                        </div>
                        <a href="{{route('news.detail',$item->slug)}}" class="mt-3 btn btn-dark ">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
        <div class="row">
            <div class="col-12 mt-2 mt-md-4 justify-content-center">
                {{ $items->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BLOG -->


<!-- START SECTION SUBSCRIBE NEWSLETTER -->
@livewire('customer.newsletter-main')
<!-- START SECTION SUBSCRIBE NEWSLETTER -->
</div>
<!-- END MAIN CONTENT -->   
@endsection
