@extends('customer.layouts.master')
@section('title','Career - Markket')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Career</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Company</li>
                    <li class="breadcrumb-item active">Career</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->


<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION CONTACT -->
<div class="section ">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-6">
            	<div class="heading_s1">
                	<h2>Send Your Resume</h2>
                </div>
                {{-- <p class="leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p> --}}
                <div class="field_form">
                   @livewire('customer.job-resume-form')
                </div>
            </div>
            <div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
                <img src="upload/other/resumecareer.png" alt="contactus_img"/>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->


<!-- START SECTION BLOG -->
<div class="section small_pt pb_70">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6 col-md-8">
            	<div class="heading_s1 text-center">
                	<h2>Job Advertisements</h2>
                </div>
                <p class="leads text-center">There are currently no open positions.</p>
            </div>
        </div>
        <div class="row justify-content-center">
        	<div class="col-lg-4 col-md-6">
            	<div class="blog_post blog_style1 box_shadow1">
                	<div class="blog_img">
                        <a href="blog-single.html">
                            <img src="customer_assets/images/furniture_blog_img1.jpg" alt="furniture_blog_img1">
                        </a>
                    </div>
                    <div class="blog_content bg-white">
                    	<div class="blog_text">
                            <h5 class="blog_title"><a href="blog-single.html">But I must explain to you how all this mistaken idea</a></h5>
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                                <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                            </ul>
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything hidden in the text</p>
                            <a   class="btn btn-block btn-fill-out"  href="{{route('career_detail','job')}}">Apply</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
            	<div class="blog_post blog_style1 box_shadow1">
                	<div class="blog_img">
                        <a href="blog-single.html">
                            <img src="customer_assets/images/furniture_blog_img2.jpg" alt="furniture_blog_img2">
                        </a>
                    </div>
                    <div class="blog_content bg-white">
                    	<div class="blog_text">
                            <h5 class="blog_title"><a href="blog-single.html">On the other hand we provide denounce with righteous</a></h5>
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                                <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                            </ul>
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything hidden in the text</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
            	<div class="blog_post blog_style1 box_shadow1">
                	<div class="blog_img">
                        <a href="blog-single.html">
                            <img src="customer_assets/images/furniture_blog_img3.jpg" alt="furniture_blog_img3">
                        </a>
                    </div>
                    <div class="blog_content bg-white">
                    	<div class="blog_text">
                            <h5 class="blog_title"><a href="blog-single.html">Why is a ticket to Lagos so expensive?</a></h5>
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                                <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                            </ul>
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything hidden in the text</p>
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
