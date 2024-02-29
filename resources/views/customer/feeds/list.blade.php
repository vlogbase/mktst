@extends('customer.layouts.master')
@section('title','Industry News - Markket')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section page-title-mini" style="background-color:chocolate;">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-12 text-center">
                <div class="page-title">
            		<h1 style="color:white!important;">Industry News</h1>
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
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('rss_feed') }}" class="btn {{ $slug ? 'btn-secondary' : 'btn-fill-out'}} rounded-0">All</a>
                    @foreach ($feedCategories as $item)
                    <a href="?c={{$item->slug}}" class="btn {{ $slug === $item->slug ? 'btn-fill-out' : 'btn-secondary'}} rounded-0">{{$item->name}}</a>
                    @endforeach
                    
                    
                  </div>
            </div>
        </div>
       <div class="row">
        @include('customer.component.latest-rss', ['feeds' => $feeds]) 
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
