@extends('customer.layouts.master')
@section('title','Blogs - Markket')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Blogs</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Contents</li>
                    <li class="breadcrumb-item active">Blogs</li>
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
