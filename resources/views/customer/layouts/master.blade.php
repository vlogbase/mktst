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
        @yield('loader')
        @include('customer.layouts.partials.header')
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
			
            Livewire.on('succesAlert', postId => {
				Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: postId,
                })
			})

            Livewire.on('errorAlert', postId => {
				Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: postId,
                })
			})
			
			
			</script>
        @yield('js')
	</body>
	<!--end::Body-->
</html>