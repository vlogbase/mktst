<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<!--begin::Head-->
	<head><base href="">
		<title>@yield('title',config('app.name'))</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		{{-- <meta name="keywords" content="@yield('keywords')" /> --}}
		<meta name="description" content="@yield('description','We supply a diverse range of chilled and frozen foods as well as a comprehensive selection of retail, catering products and non-food items. Our products also include established brands as well as a competitively priced own label ranges, creating a ‘one-stop-shop’ for all our clients.')">
		<meta name="author" content="ghospy.com">
		<meta property="og:locale" content="en_EN" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="@yield('title')" />
		<meta property="og:description" content="@yield('description')" />
		<meta property="og:url" content="{{Request::url()}}" />
		<meta property="og:site_name" content="SavoyFoods | Catering Supplies" />
		<meta property="og:image" content="{{asset('/upload/logo/logo.jpeg')}}" />
		<meta property="og:image:alt" content="Savoy Logo" />
		<link rel="canonical" href="{{url('/')}}" />

        <link rel="shortcut icon" href="/upload/logos/savoyicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="/upload/logos/savoyicon.ico">
		
        
        <!-- Animation CSS -->
        <link rel="stylesheet" href="/customer_assets/css/animate.css">	
        <!-- Latest Bootstrap min CSS -->
        <link rel="stylesheet" href="/customer_assets/bootstrap/css/bootstrap.min.css">
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
        <!-- Icon Font CSS -->
        <link rel="stylesheet" href="/customer_assets/css/all.min.css">
        <link rel="stylesheet" href="/customer_assets/css/ionicons.min.css">
        <link rel="stylesheet" href="/customer_assets/css/themify-icons.css">
        <link rel="stylesheet" href="/customer_assets/css/linearicons.css">
        <link rel="stylesheet" href="/customer_assets/css/flaticon.css">
        <link rel="stylesheet" href="/customer_assets/css/simple-line-icons.css">
        <!--- owl carousel CSS-->
        <link rel="stylesheet" href="/customer_assets/owlcarousel/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/customer_assets/owlcarousel/css/owl.theme.css">
        <link rel="stylesheet" href="/customer_assets/owlcarousel/css/owl.theme.default.min.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="/customer_assets/css/magnific-popup.css">
        <!-- jquery-ui CSS -->
        <link rel="stylesheet" href="/customer_assets/css/jquery-ui.css">
        <!-- Slick CSS -->
        <link rel="stylesheet" href="/customer_assets/css/slick.css">
        <link rel="stylesheet" href="/customer_assets/css/slick-theme.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="/customer_assets/css/style.css">
        <link rel="stylesheet" href="/customer_assets/css/responsive.css">

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @livewireStyles
        @yield('css')
	</head>
	<!--end::Head-->

	<!--begin::Body-->
	<body>
        <!-- LOADER -->
        <div class="preloader">
            <div class="lds-ellipsis">
                <img src="/upload/other/loading_gif_main.gif" alt="">
            </div>
        </div>
        <!-- END LOADER -->
        @include('customer.layouts.partials.header')
        @if(Auth::check() || Auth::user()->email_verified_at == NULL)
        <div class="row ">
            <div class="col-12 text-center ">
                <div class="alert alert-warning p-5" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                        <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"/>
                      </svg> Please verify your email. Unverified accounts cannot make purchases. <a class=" text-primary" href="">Click Resend</a> Verification.
                  </div>
            </div>
        </div>
        @endif
        @yield('content')

        @include('customer.layouts.partials.footer')
        <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

        <!-- Latest jQuery --> 
        <script src="/customer_assets/js/jquery-3.6.0.min.js"></script> 
        <!-- jquery-ui --> 
        <script src="/customer_assets/js/jquery-ui.js"></script>
        <!-- popper min js -->
        <script src="/customer_assets/js/popper.min.js"></script>
        <!-- Latest compiled and minified Bootstrap --> 
        <script src="/customer_assets/bootstrap/js/bootstrap.min.js"></script> 
        <!-- owl-carousel min js  --> 
        <script src="/customer_assets/owlcarousel/js/owl.carousel.min.js"></script> 
        <!-- magnific-popup min js  --> 
        <script src="/customer_assets/js/magnific-popup.min.js"></script> 
        <!-- waypoints min js  --> 
        <script src="/customer_assets/js/waypoints.min.js"></script> 
        <!-- parallax js  --> 
        <script src="/customer_assets/js/parallax.js"></script> 
        <!-- countdown js  --> 
        <script src="/customer_assets/js/jquery.countdown.min.js"></script> 
        <!-- imagesloaded js --> 
        <script src="/customer_assets/js/imagesloaded.pkgd.min.js"></script>
        <!-- isotope min js --> 
        <script src="/customer_assets/js/isotope.min.js"></script>
        <!-- jquery.dd.min js -->
        <script src="/customer_assets/js/jquery.dd.min.js"></script>
        <!-- slick js -->
        <script src="/customer_assets/js/slick.min.js"></script>
        <!-- elevatezoom js -->
        <script src="/customer_assets/js/jquery.elevatezoom.js"></script>
        <!-- scripts js --> 
        <script src="/customer_assets/js/scripts.js"></script>
        @livewireScripts
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

			Livewire.on('itemAdded', postId => {
				Toast.fire({
					icon: 'success',
					title: 'Added to Cart'
				})
			})
			Livewire.on('itemUpdated', postId => {
				Toast.fire({
					icon: 'success',
					title: 'Cart Updated'
				})
			})
			Livewire.on('itemDeleted', postId => {
				Toast.fire({
					icon: 'success',
					title: 'Product Deleted'
				})
			})
			Livewire.on('errorShow', postId => {
				Toast.fire({
					icon: 'error',
					title: postId
				})
			})
			Livewire.on('succesShow', postId => {
				Toast.fire({
					icon: 'success',
					title: postId
				})
			})
			Livewire.on('loginShow', postId => {
				Swal.fire({
				title: postId,
				icon: 'warning',
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Register!',
				showDenyButton: true,
				denyButtonText: `Login`,
				denyButtonColor: '#d33',
				showCancelButton: true,
				cancelButtonText: 'Cancel',
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href="/register";
					} else if (result.isDenied) {
						window.location.href="/login";
					}
				})
			})
			
			
			
			</script>
        @yield('js')
	</body>
	<!--end::Body-->
</html>