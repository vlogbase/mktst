const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
 mix.styles([
    'public/customer_assets/bootstrap/css/bootstrap.min.css',
    'public/customer_assets/css/animate.css',
    'public/customer_assets/css/all.min.css',
    'public/customer_assets/css/ionicons.min.css',
    'public/customer_assets/css/themify-icons.css',
    'public/customer_assets/css/linearicons.css',
    'public/customer_assets/css/flaticon.css',
    'public/customer_assets/css/simple-line-icons.css',
    'public/customer_assets/owlcarousel/css/owl.carousel.min.css',
    'public/customer_assets/owlcarousel/css/owl.theme.default.min.css',
    'public/customer_assets/css/style.css',
    'public/customer_assets/css/responsive.css',
], 'public/customer_assets/css/all.css');

mix.js([
    'public/customer_assets/js/jquery-3.6.0.min.js',
    'public/customer_assets/js/jquery-ui.js',
    'public/customer_assets/js/popper.min.js',
    'public/customer_assets/bootstrap/js/bootstrap.min.js',
    'public/customer_assets/owlcarousel/js/owl.carousel.min.js',
    'public/customer_assets/js/magnific-popup.min.js',
    'public/customer_assets/js/waypoints.min.js',
    'public/customer_assets/js/parallax.js',
    'public/customer_assets/js/jquery.countdown.min.js',
    'public/customer_assets/js/imagesloaded.pkgd.min.js',
    'public/customer_assets/js/isotope.min.js',
    'public/customer_assets/js/jquery.dd.min.js',
    'public/customer_assets/js/slick.min.js',
    'public/customer_assets/js/jquery.elevatezoom.js',
    'public/customer_assets/js/scripts.js',
], 'public/customer_assets/js/all.js');
