<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<!--begin::Head-->
	<head><base href="">
		<title>@yield('title',config('app.name'))</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<meta name="keywords" content="@yield('keywords')" />
		<meta name="description" content="@yield('description')">
		<meta name="author" content="ghospy.com">
		<meta property="og:locale" content="en_EN" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="@yield('title')" />
		<meta property="og:description" content="@yield('description')" />
		<meta property="og:url" content="{{Request::url()}}" />
		<meta property="og:site_name" content="SavoyFoods | Catering Supplies" />
		<meta property="og:image" content="{{asset('upload/logo/logo.jpeg')}}" />
		<meta property="og:image:alt" content="Bolive Logo" />
		<link rel="canonical" href="{{url('/')}}" />

        <link rel="shortcut icon" href="upload/logos/savoyicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="upload/logos/savoyicon.ico">
		
        
        <!-- Animation CSS -->
        <link rel="stylesheet" href="customer_assets/css/animate.css">	
        <!-- Latest Bootstrap min CSS -->
        <link rel="stylesheet" href="customer_assets/bootstrap/css/bootstrap.min.css">
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
        <!-- Icon Font CSS -->
        <link rel="stylesheet" href="customer_assets/css/all.min.css">
        <link rel="stylesheet" href="customer_assets/css/ionicons.min.css">
        <link rel="stylesheet" href="customer_assets/css/themify-icons.css">
        <link rel="stylesheet" href="customer_assets/css/linearicons.css">
        <link rel="stylesheet" href="customer_assets/css/flaticon.css">
        <link rel="stylesheet" href="customer_assets/css/simple-line-icons.css">
        <!--- owl carousel CSS-->
        <link rel="stylesheet" href="customer_assets/owlcarousel/css/owl.carousel.min.css">
        <link rel="stylesheet" href="customer_assets/owlcarousel/css/owl.theme.css">
        <link rel="stylesheet" href="customer_assets/owlcarousel/css/owl.theme.default.min.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="customer_assets/css/magnific-popup.css">
        <!-- Slick CSS -->
        <link rel="stylesheet" href="customer_assets/css/slick.css">
        <link rel="stylesheet" href="customer_assets/css/slick-theme.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="customer_assets/css/style.css">
        <link rel="stylesheet" href="customer_assets/css/responsive.css">

        @yield('css')
	</head>
	<!--end::Head-->

	<!--begin::Body-->
	<body>
        <!-- LOADER -->
        <div class="preloader">
            <div class="lds-ellipsis">
                <img src="upload/other/loading_gif_main.gif" alt="">
            </div>
        </div>
        <!-- END LOADER -->
        @include('customer.layouts.partials.header')
        
        @yield('content')

        @include('customer.layouts.partials.footer')
        <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

        <!-- Latest jQuery --> 
        <script src="customer_assets/js/jquery-3.6.0.min.js"></script> 
        <!-- popper min js -->
        <script src="customer_assets/js/popper.min.js"></script>
        <!-- Latest compiled and minified Bootstrap --> 
        <script src="customer_assets/bootstrap/js/bootstrap.min.js"></script> 
        <!-- owl-carousel min js  --> 
        <script src="customer_assets/owlcarousel/js/owl.carousel.min.js"></script> 
        <!-- magnific-popup min js  --> 
        <script src="customer_assets/js/magnific-popup.min.js"></script> 
        <!-- waypoints min js  --> 
        <script src="customer_assets/js/waypoints.min.js"></script> 
        <!-- parallax js  --> 
        <script src="customer_assets/js/parallax.js"></script> 
        <!-- countdown js  --> 
        <script src="customer_assets/js/jquery.countdown.min.js"></script> 
        <!-- imagesloaded js --> 
        <script src="customer_assets/js/imagesloaded.pkgd.min.js"></script>
        <!-- isotope min js --> 
        <script src="customer_assets/js/isotope.min.js"></script>
        <!-- jquery.dd.min js -->
        <script src="customer_assets/js/jquery.dd.min.js"></script>
        <!-- slick js -->
        <script src="customer_assets/js/slick.min.js"></script>
        <!-- elevatezoom js -->
        <script src="customer_assets/js/jquery.elevatezoom.js"></script>
        <!-- scripts js --> 
        <script src="customer_assets/js/scripts.js"></script>
        
        @yield('js')
	</body>
	<!--end::Body-->
</html>