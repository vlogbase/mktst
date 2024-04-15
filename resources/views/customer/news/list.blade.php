@extends('customer.layouts.master')
@section('title','News - Markket')
@section('content')

@include('customer.component.breadcrumb' , ['title' => 'News'])


<!-- START MAIN CONTENT -->
<div class="main_content">


<!-- START SECTION BLOG -->
<div class="section">
	<div class="container">
        @livewire('customer.content.news-list')
    </div>
</div>
<!-- END SECTION BLOG -->


<!-- START SECTION SUBSCRIBE NEWSLETTER -->
@livewire('customer.newsletter-main')
<!-- START SECTION SUBSCRIBE NEWSLETTER -->
</div>
<!-- END MAIN CONTENT -->   
@endsection
