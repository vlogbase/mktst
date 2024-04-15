@extends('customer.layouts.master')
@section('title','Contact Us - Markket')
@section('content')

@include('customer.component.breadcrumb' , ['title' => 'Contact Us'])


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
                        <p>Registered office<br>
                            21 Marina Court,<br>
                            Hull, HU1 1TJ</p>
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
                        <p>sales@markket.uk</p>
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
