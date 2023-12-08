@extends('customer.layouts.master')
@section('title','News - Markket')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section page-title-mini" style="background-color:chocolate;">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-12 text-center">
                <div class="page-title">
            		<h1 style="color:white!important;">News</h1>
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
