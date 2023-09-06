@extends('customer.layouts.master')
@section('title','Contact Us - Markket')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Contact Us</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Company</li>
                    <li class="breadcrumb-item active">Contact Us</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->


<!-- START MAIN CONTENT -->
<div class="main_content">

    
<!-- START SECTION CONTACT -->
<div class="section pb_70">
	<div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-map2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Address</span>
                        <p>Savoy Catering Supplies S Denes Rd, Great Yarmouth NR30 3PR, UK</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-envelope-open"></i>
                    </div>
                    <div class="contact_text">
                        <span>Email Address</span>
                        <p>sales@savoycatering.co.uk</p>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-tablet2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Phone</span>
                        <p>01493 855403</p>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

<!-- START SECTION CONTACT -->
<div class="section pt-0">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-6">
            	<div class="heading_s1">
                	<h2>Get In touch</h2>
                </div>
                {{-- <p class="leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p> --}}
                <div class="field_form">
                   @livewire('customer.message-form')
                </div>
            </div>
            <div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
                <img src="upload/other/contactus.png" alt="contactus_img"/>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

</div>
<!-- END MAIN CONTENT -->   
@endsection
