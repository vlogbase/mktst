@extends('customer.layouts.master')
@section('title','Industry News - Markket')
@section('content')

@include('customer.component.breadcrumb' , ['title' => 'Industry News'])


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
