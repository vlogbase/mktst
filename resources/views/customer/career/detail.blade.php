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
                    <li class="breadcrumb-item "><a href="{{route('career')}}">Career</a></li>
                    <li class="breadcrumb-item active">Job Detail</li>
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
        	<div class="col-lg-12">
                <div class="single_post">
                    <h2 class="blog_title">But I must explain to you how all this mistaken idea</h2>
                    <ul class="list_none blog_meta">
                        <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                        <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                    </ul>
                    <div class="blog_img">
                        <img src="/customer_assets/images/blog_img1.jpg" alt="blog_img1">
                    </div>
                    <div class="blog_content">
                        <div class="blog_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur malesuada malesuada metus ut placerat. Cras a porttitor quam, eget ornare sapien. In sit amet vulputate metus. Nullam eget rutrum nisl. Sed tincidunt lorem sed maximus interdum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean scelerisque efficitur mauris nec tincidunt. Ut cursus leo mi, eu ultricies magna faucibus id.</p>
                            <p>
                            <ul>
                                <li>Opportunity to take responsibility from day one, improve your skills and learn continuously</li>
                                <li>Opportunity to take responsibility from day one, improve your skills and learn continuously</li>
                                <li>Opportunity to take responsibility from day one, improve your skills and learn continuously</li>
                                <li>Opportunity to take responsibility from day one, improve your skills and learn continuously</li>
                                <li>Opportunity to take responsibility from day one, improve your skills and learn continuously</li>
                                <li>Opportunity to take responsibility from day one, improve your skills and learn continuously</li>
                                <li>Opportunity to take responsibility from day one, improve your skills and learn continuously</li>
                            </ul>
                        </p>
                        </div>
                        <br>
                        <div class="field_form">
                            <form method="post" name="enq">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <input required placeholder="Enter Name *" id="first-name" class="form-control" name="name" type="text">
                                     </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <input required placeholder="Enter Email *" id="email" class="form-control" name="email" type="email">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <input required placeholder="Enter Phone No. *" id="phone" class="form-control" name="phone">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <input placeholder="Enter Subject" id="subject" class="form-control" name="subject">
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <textarea required placeholder="Message *" id="description" class="form-control" name="message" rows="4"></textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" title="Submit Your Message!" class="btn btn-fill-out" id="submitButton" name="submit" value="Submit">Send Message</button>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div id="alert-msg" class="alert-msg text-center"></div>
                                    </div>
                                </div>
                            </form>		
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




</div>
<!-- END MAIN CONTENT -->   
@endsection
