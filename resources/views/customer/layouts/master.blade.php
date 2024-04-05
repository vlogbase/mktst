<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->

<head>
    <base href="">
    <title>@yield('title', config('app.name'))</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    {{-- <meta name="keywords" content="@yield('keywords')" /> --}}
    <meta name="description" content="@yield('description', 'We supply a diverse range of chilled and frozen foods as well as a comprehensive selection of retail, catering products and non-food items. Our products also include established brands as well as a competitively priced own label ranges, creating a ‘one-stop-shop’ for all our clients.')">
    <meta name="author" content="ghospy.com">
    <meta property="og:locale" content="en_EN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:site_name" content="Markket | UK" />
    <meta property="og:image" content="{{ asset('/upload/logo/logo.jpeg') }}" />
    <meta property="og:image:alt" content="Marrket Logo" />
    <link rel="canonical" href="{{ url('/') }}" />

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">


    <link rel="icon" type="image/x-icon" href="/upload/favicons/favicon.ico">
    <link rel="shortcut icon" href="/upload/favicons/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/upload/favicons/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/upload/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/upload/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/upload/favicons/favicon-16x16.png">
    <link rel="manifest" href="/upload/favicons/site.webmanifest">


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('customer_assets/css/all.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//code.jivosite.com/widget/R7EojPvkQm" async></script>

    <style>
        .bottom-nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 1000;
        }

        @media (min-width: 768px) {
            .bottom-nav {
                display: none;
            }
        }
    </style>
    @livewireStyles
    @yield('css')
</head>
<!--end::Head-->

<!--begin::Body-->

<body>
    @yield('loader')
    @if (config('app.env') == 'local')
        <div class="alert alert-warning text-center mx-auto" role="alert">
            Test Mode
        </div>
    @endif
    @include('customer.layouts.partials.header')
    @yield('content')

    @include('customer.layouts.partials.footer')
    {{-- <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> --}}
    <div class="bottom-nav text-dark">
        <div class="container">
            <div class="row text-center py-3 " style="background-color: orange;">
                <div class="col-3">
                    <a href="{{route('home')}}" class=" {{ request()->routeIs('home') ? 'text-white bg-dark p-2' : 'text-dark' }}" style="font-weight: 700;">
                        Home
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{route('products')}}" class="{{ request()->routeIs('products') ? 'text-white bg-dark p-2' : 'text-dark' }}" style="font-weight: 700;">
                        Products
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{route('cart')}}" class="{{ request()->routeIs('cart') ? 'text-white bg-dark p-2' : 'text-dark' }}" style="font-weight: 700;">
                        Cart
                    </a>
                </div>
                <div class="col-3">
                    <p class="text-white"></p>
                </div>
            </div>
        </div>
    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lazyImages = document.querySelectorAll('.lazy');

            var lazyLoad = function() {
                lazyImages.forEach(function(img) {
                    if (img.getBoundingClientRect().top < window.innerHeight && img.getAttribute(
                            'data-src')) {
                        img.src = img.getAttribute('data-src');
                        img.removeAttribute('data-src');
                    }
                });
            };

            // Initial load
            lazyLoad();

            // Lazy load on scroll
            window.addEventListener('scroll', lazyLoad);
        });
    </script>

    <script>
        var swiper = new Swiper(".mySwiper", {

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },


            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 4,
                    spaceBetween: 40
                }
            }
        })
    </script>

    @livewireScripts
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lazyImages = document.querySelectorAll('.lazy');

            var lazyLoad = function() {
                lazyImages.forEach(function(img) {
                    if (img.getBoundingClientRect().top < window.innerHeight && img.getAttribute(
                            'data-src')) {
                        img.src = img.getAttribute('data-src');
                        img.removeAttribute('data-src');
                    }
                });
            };

            // Initial load
            lazyLoad();

            // Lazy load on scroll
            window.addEventListener('scroll', lazyLoad);
        });
    </script>
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
            Swal.fire({
                icon: 'success',
                title: 'Added to Cart',
                showDenyButton: true,
                confirmButtonText: 'Go to Cart',
                confirmButtonColor: '#F7901E',
                denyButtonColor: '#676869',
                denyButtonText: 'Contiune Shopping',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = '/cart';
                } else if (result.isDenied) {

                }
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
                    window.location.href = "/register";
                } else if (result.isDenied) {
                    window.location.href = "/login";
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

        Livewire.on('interactUser', postId => {
            Swal.fire({
                icon: 'info',
                title: postId,
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Livewire.emit('processDone', postId)
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        })


        Livewire.on('timerAlert', postId => {
            Swal.fire({
                title: 'Waiting..',
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
            })
        })
    </script>

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>

    @yield('js')
    @stack('scripts')
</body>
<!--end::Body-->

</html>
