@extends('customer.layouts.master')
@section('title','Blogs - Markket')
@section('content')

@include('customer.component.breadcrumb' , ['title' => 'Blogs'])


<!-- START MAIN CONTENT -->
<div class="main_content">


<!-- START SECTION BLOG -->
<div class="section">
	<div class="container">
        @livewire('customer.content.blogs-list')
    </div>
</div>
<!-- END SECTION BLOG -->


<!-- START SECTION SUBSCRIBE NEWSLETTER -->
@livewire('customer.newsletter-main')
<!-- START SECTION SUBSCRIBE NEWSLETTER -->
</div>
<!-- END MAIN CONTENT -->   
@endsection
