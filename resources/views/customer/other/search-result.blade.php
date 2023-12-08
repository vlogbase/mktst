@extends('customer.layouts.master')
@section('title','Search - Markket')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section  page-title-mini" style="background-color:chocolate;">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-12 text-center">
                <div class="page-title">
            		<h1 style="color:white!important;">Searched for {{$search}}</h1>
                </div>
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
        @if($data['products']->count() > 0 || $data['categories']->count() > 0 || $data['blogs']->count() > 0 || $data['news']->count() > 0)
            @if($data['products']->count() > 0)
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="single_post">
                        <h2 class="blog_title">Products ({{$data['products']->count()}})</h2>
                        <div class="row shop_container grid" id="product-list">
                        @foreach($data['products'] as $product)
                            <div class="col-md-4 col-6">
                            @livewire('customer.product-card', ['product' => $product,'type' => 'card'], key($product->id))
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($data['categories']->count() > 0)
            <div class="row mt-5">
                <div class="col-xl-9 mx-auto">
                    <div class="single_post">
                        <h2 class="blog_title">Categories ({{$data['categories']->count()}})</h2>
                        @php
                                                        $countChild = $data['categories']->count();
                                                        if($countChild > 8)
                                                        {
                                                            $groups = $data['categories']->split(2);
                                                            $groups_1 =  $groups[0];
                                                            $groups_2 =  $groups[1];
                                                        }else{
                                                            $groups_1 = $data['categories'];
                                                        }
                                                    @endphp
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <ul>
                                                                @foreach($groups_1 as $item)
                                                                        <li><a class="ml-3 mr-3" href="{{route('category_products',$item->slug)}}"> {{$item->name}}</a>
                                                                        </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        @if($countChild > 8)
                                                        <div class="col-md-6">
                                                            <ul>
                                                                @foreach($groups_2 as $item)
                                                                        <li><a class="ml-3 mr-3" href="{{route('category_products',$item->slug)}}"> {{$item->name}}</a>
                                                                        </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        @endif
                                                    </div>
                        
                    </div>
                </div>
            </div>
            @endif
            @if($data['blogs']->count() > 0)
            <div class="row mt-5">
                <div class="col-xl-9 mx-auto">
                    <div class="single_post">
                        <h2 class="blog_title">Blogs ({{$data['blogs']->count()}})</h2>
                        <div class="row">
                            @foreach ($data['blogs'] as $item)
                            <div class="col-lg-6 col-md-6">
                                <div class="blog_post blog_style1 box_shadow1">
                                    <div class="blog_img">
                                        <a href="{{route('blogs.detail',$item->slug)}}">
                                            <img src="{{$item->image}}" alt="{{$item->name}}">
                                        </a>
                                    </div>
                                    <div class="blog_content bg-white">
                                        <div class="blog_text">
                                            <h5 class="blog_title"><a href="{{route('blogs.detail',$item->slug)}}">{{$item->name}}</a></h5>
                                            <ul class="list_none blog_meta">
                                                <li class="text-secondary"><i class="ti-calendar"></i> {{$item->humanTime()}}</li>
                                                
                                            </ul>
                                            <p>{{substr($item->text, 0, 150).'...'}}</p>
                                        </div>
                                        <a href="{{route('blogs.detail',$item->slug)}}" class="mt-3 btn btn-dark ">Read More</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($data['news']->count() > 0)
            <div class="row mt-5">
                <div class="col-xl-9 mx-auto">
                    <div class="single_post">
                        <h2 class="blog_title">News ({{$data['news']->count()}})</h2>
                        <div class="row">
                            @foreach ($data['news'] as $item)
                            <div class="col-lg-6 col-md-6">
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
                    </div>
                </div>
            </div>
            @endif
        @else
            <div class="row mt-3">
                <div class="col-xl-9 mx-auto">
                    <div class="single_post">
                        <h2 class="blog_title">We could not find anything...</h2>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<!-- END SECTION BLOG -->

</div>
<!-- END MAIN CONTENT -->   
@endsection
