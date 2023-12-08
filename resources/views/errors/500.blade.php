@extends('customer.layouts.master')
@section('title','500 - Markket')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini" style="background-color:chocolate;">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>500 Page Not Found</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end" >
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">500</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->


<!-- START MAIN CONTENT -->
<div class="main_content">


<!-- START 500 SECTION -->
<div class="section">
	<div class="error_wrap">
    	<div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-10 order-lg-first">
                	<div class="text-center">
                        <div class="error_txt">500</div>
                        <h5 class="mb-2 mb-sm-3">oops! Internal Server Error!</h5> 
                        <p>This message indicates that an error has occurred during connection to the server and that the requested page cannot be accessed</p>
                        <div class="search_form pb-3 pb-md-4">
                            <form method="post">
                                <input name="text" id="text" type="text" placeholder="Search" class="form-control">
                                <button type="submit" class="btn icon_search"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                        <a href="index.html" class="btn btn-fill-out">Back To Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END 500 SECTION -->

</div>
<!-- END MAIN CONTENT -->   
@endsection
