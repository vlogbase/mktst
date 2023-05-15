<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SavoyFoods</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" href="/upload/logos/savoyicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="/upload/logos/savoyicon.ico">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

   <!-- Latest Bootstrap min CSS -->
   <link rel="stylesheet" href="/customer_assets/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="/customer_assets/css/ionicons.min.css">
   <link rel="stylesheet" href="/customer_assets/css/themify-icons.css">
<style>
    /**
    * Template Name: Maundy - v4.6.0
    * Template URL: https://bootstrapmade.com/maundy-free-coming-soon-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    */

    /*--------------------------------------------------------------
    # General
    --------------------------------------------------------------*/
    body {
      font-family: "Open Sans", sans-serif;
      color: #fff;
      background: url("/upload/other/bg.jpg") top center no-repeat;
      background-size: cover;
      position: relative;
    }

    @media (min-width: 1024px) {
      body {
        background-attachment: fixed;
      }
    }

    a {
      color: #24b7a4;
      text-decoration: none;
    }

    a:hover {
      color: #36d8c3;
      text-decoration: none;
    }

    h1, h2, h3, h4, h5, h6 {
      font-family: "Raleway", sans-serif;
    }

    #main {
      position: relative;
    }

    /*--------------------------------------------------------------
    # Back to top button
    --------------------------------------------------------------*/
    .back-to-top {
      position: fixed;
      visibility: hidden;
      opacity: 0;
      right: 15px;
      bottom: 15px;
      z-index: 996;
      background: #24b7a4;
      width: 40px;
      height: 40px;
      border-radius: 50px;
      transition: all 0.4s;
    }
    .back-to-top i {
      font-size: 28px;
      color: #fff;
      line-height: 0;
    }
    .back-to-top:hover {
      background: #2ed6c0;
      color: #fff;
    }
    .back-to-top.active {
      visibility: visible;
      opacity: 1;
    }

    /*--------------------------------------------------------------
    # Header
    --------------------------------------------------------------*/
    #header {
      position: relative;
      width: 100%;
      height: 100%;
      padding: 100px 0;
      /* countdown */
    }
    #header h1 {
      margin: 0 0 10px 0;
      font-size: 48px;
      font-weight: 700;
      line-height: 56px;
      color: #fff;
    }
    #header h2 {
      color: #eee;
      margin-bottom: 40px;
      font-size: 22px;
    }
    #header .countdown {
      margin-bottom: 80px;
    }
    #header .countdown div {
      text-align: center;
      border: 2px solid rgba(255, 255, 255, 0.8);
      border-radius: 8px;
      margin: 10px 10px;
      width: 100px;
      padding: 15px 0;
    }
    #header .countdown div h3 {
      font-weight: 700;
      font-size: 32px;
      margin-bottom: 15px;
    }
    #header .countdown div h4 {
      font-size: 16px;
      font-weight: 600;
    }
    @media (max-width: 575px) {
      #header .countdown div {
        width: 70px;
        padding: 10px 0;
        margin: 10px 8px;
      }
      #header .countdown div h3 {
        font-size: 28px;
        margin-bottom: 10px;
      }
      #header .countdown div h4 {
        font-size: 14px;
        font-weight: 500;
      }
    }
    #header .subscribe {
      font-size: 15px;
      text-align: center;
    }
    #header .subscribe h4 {
      font-size: 20px;
      font-weight: 600;
      color: #fff;
      position: relative;
      padding-bottom: 12px;
    }
    #header .subscribe .subscribe-form {
      min-width: 300px;
      margin-top: 10px;
      background: #fff;
      padding: 6px 10px;
      position: relative;
      border-radius: 50px;
      text-align: left;
    }
    #header .subscribe .subscribe-form input[type=email] {
      border: 0;
      padding: 4px 8px;
      width: calc(100% - 100px);
    }
    #header .subscribe .subscribe-form input[type=submit] {
      position: absolute;
      top: 0;
      right: -2px;
      bottom: 0;
      border: 0;
      background: none;
      font-size: 16px;
      padding: 0 20px;
      background: #24b7a4;
      color: #fff;
      transition: 0.3s;
      border-radius: 50px;
      box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
    }
    #header .subscribe .subscribe-form input[type=submit]:hover {
      background: #22ae9c;
    }
    #header .subscribe .error-message {
      display: none;
      color: #ed3c0d;
      text-align: center;
      padding: 15px;
      font-weight: 600;
    }
    #header .subscribe .sent-message {
      display: none;
      color: #18d26e;
      text-align: center;
      padding: 15px;
      font-weight: 600;
    }
    #header .subscribe .loading {
      display: none;
      text-align: center;
      padding: 15px;
    }
    #header .subscribe .loading:before {
      content: "";
      display: inline-block;
      border-radius: 50%;
      width: 24px;
      height: 24px;
      margin: 0 10px -6px 0;
      border: 3px solid #18d26e;
      border-top-color: #eee;
      -webkit-animation: animate-loading-notify 1s linear infinite;
      animation: animate-loading-notify 1s linear infinite;
    }
    @-webkit-keyframes animate-loading-notify {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }
    @keyframes animate-loading-notify {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }
    #header .social-links {
      margin-top: 40px;
    }
    #header .social-links a {
      font-size: 16px;
      color: #fff;
      margin: 0 3px;
      border-radius: 50%;
      width: 48px;
      height: 48px;
      transition: 0.3s;
      border: 1px solid rgba(255, 255, 255, 0.5);
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }
    #header .social-links a i {
      line-height: 0;
    }
    #header .social-links a:hover {
      background: #24b7a4;
      border-color: #24b7a4;
    }

    /*--------------------------------------------------------------
    # Navigation Menu
    --------------------------------------------------------------*/
    /**
    * Desktop Navigation 
    */
    .navbar {
      padding: 0;
    }
    .navbar ul {
      margin: 0;
      padding: 0;
      display: flex;
      list-style: none;
      align-items: center;
    }
    .navbar li {
      position: relative;
    }
    .navbar a, .navbar a:focus {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 0 10px 30px;
      font-family: "Raleway", sans-serif;
      font-size: 16px;
      font-weight: 700;
      color: #3a5469;
      white-space: nowrap;
      transition: 0.3s;
    }
    .navbar a i, .navbar a:focus i {
      font-size: 12px;
      line-height: 0;
      margin-left: 5px;
    }
    .navbar a:hover, .navbar .active, .navbar .active:focus, .navbar li:hover > a {
      color: #24b7a4;
    }
    .navbar .getstarted, .navbar .getstarted:focus {
      background: #24b7a4;
      padding: 8px 20px;
      margin-left: 30px;
      border-radius: 4px;
      color: #fff;
    }
    .navbar .getstarted:hover, .navbar .getstarted:focus:hover {
      color: #fff;
      background: #28ccb7;
    }
    .navbar .dropdown ul {
      display: block;
      position: absolute;
      left: 14px;
      top: calc(100% + 30px);
      margin: 0;
      padding: 10px 0;
      z-index: 99;
      opacity: 0;
      visibility: hidden;
      background: #fff;
      box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
      transition: 0.3s;
      border-radius: 4px;
    }
    .navbar .dropdown ul li {
      min-width: 200px;
    }
    .navbar .dropdown ul a {
      padding: 10px 20px;
      font-size: 15px;
      text-transform: none;
      font-weight: 600;
    }
    .navbar .dropdown ul a i {
      font-size: 12px;
    }
    .navbar .dropdown ul a:hover, .navbar .dropdown ul .active:hover, .navbar .dropdown ul li:hover > a {
      color: #24b7a4;
    }
    .navbar .dropdown:hover > ul {
      opacity: 1;
      top: 100%;
      visibility: visible;
    }
    .navbar .dropdown .dropdown ul {
      top: 0;
      left: calc(100% - 30px);
      visibility: hidden;
    }
    .navbar .dropdown .dropdown:hover > ul {
      opacity: 1;
      top: 0;
      left: 100%;
      visibility: visible;
    }
    @media (max-width: 1366px) {
      .navbar .dropdown .dropdown ul {
        left: -90%;
      }
      .navbar .dropdown .dropdown:hover > ul {
        left: -100%;
      }
    }

    /**
    * Mobile Navigation 
    */
    .mobile-nav-toggle {
      color: #314759;
      font-size: 28px;
      cursor: pointer;
      display: none;
      line-height: 0;
      transition: 0.5s;
    }
    .mobile-nav-toggle.bi-x {
      color: #fff;
    }

    @media (max-width: 991px) {
      .mobile-nav-toggle {
        display: block;
      }

      .navbar ul {
        display: none;
      }
    }
    .navbar-mobile {
      position: fixed;
      overflow: hidden;
      top: 0;
      right: 0;
      left: 0;
      bottom: 0;
      background: rgba(31, 45, 56, 0.9);
      transition: 0.3s;
    }
    .navbar-mobile .mobile-nav-toggle {
      position: absolute;
      top: 15px;
      right: 15px;
    }
    .navbar-mobile ul {
      display: block;
      position: absolute;
      top: 55px;
      right: 15px;
      bottom: 15px;
      left: 15px;
      padding: 10px 0;
      border-radius: 10px;
      background-color: #fff;
      overflow-y: auto;
      transition: 0.3s;
    }
    .navbar-mobile a, .navbar-mobile a:focus {
      padding: 10px 20px;
      font-size: 15px;
      color: #314759;
    }
    .navbar-mobile a:hover, .navbar-mobile .active, .navbar-mobile li:hover > a {
      color: #24b7a4;
    }
    .navbar-mobile .getstarted, .navbar-mobile .getstarted:focus {
      margin: 15px;
    }
    .navbar-mobile .dropdown ul {
      position: static;
      display: none;
      margin: 10px 20px;
      padding: 10px 0;
      z-index: 99;
      opacity: 1;
      visibility: visible;
      background: #fff;
      box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
    }
    .navbar-mobile .dropdown ul li {
      min-width: 200px;
    }
    .navbar-mobile .dropdown ul a {
      padding: 10px 20px;
    }
    .navbar-mobile .dropdown ul a i {
      font-size: 12px;
    }
    .navbar-mobile .dropdown ul a:hover, .navbar-mobile .dropdown ul .active:hover, .navbar-mobile .dropdown ul li:hover > a {
      color: #24b7a4;
    }
    .navbar-mobile .dropdown > .dropdown-active {
      display: block;
    }

    /*--------------------------------------------------------------
    # Sections General
    --------------------------------------------------------------*/
    section {
      padding: 60px 0;
      overflow: hidden;
    }

    .section-bg {
      background-color: #d8f7f3;
    }

    .section-title {
      text-align: center;
      padding-bottom: 30px;
    }
    .section-title h2 {
      font-size: 32px;
      font-weight: bold;
      text-transform: uppercase;
      margin-bottom: 20px;
      padding-bottom: 20px;
      position: relative;
    }
    .section-title h2::after {
      content: "";
      position: absolute;
      display: block;
      width: 50px;
      height: 2px;
      background: #24b7a4;
      bottom: 0;
      left: calc(50% - 25px);
    }
    .section-title p {
      margin-bottom: 0;
    }

    /*--------------------------------------------------------------
    # Contact Us
    --------------------------------------------------------------*/
    .about .icon-box {
      margin-bottom: 20px;
      text-align: center;
    }
    .about .icon {
      display: flex;
      justify-content: center;
      margin-bottom: 15px;
    }
    .about .icon i {
      color: #fff;
      font-size: 42px;
      line-height: 0;
    }
    .about .title {
      font-weight: 700;
      margin-bottom: 15px;
      font-size: 18px;
      text-transform: uppercase;
    }
    .about .title a {
      color: #fff;
      transition: 0.3s;
    }
    .about .description {
      line-height: 24px;
      font-size: 14px;
    }

    /*--------------------------------------------------------------
    # Contact Us
    --------------------------------------------------------------*/
    .contact .info {
      border-top: 3px solid #24b7a4;
      border-bottom: 3px solid #24b7a4;
      padding: 30px;
      background: rgba(255, 255, 255, 0.06);
      width: 100%;
      box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);
    }
    .contact .info i {
      font-size: 20px;
      color: #fff;
      float: left;
      width: 44px;
      height: 44px;
      background: rgba(255, 255, 255, 0.1);
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50px;
      transition: all 0.3s ease-in-out;
    }
    .contact .info h4 {
      padding: 0 0 0 60px;
      font-size: 22px;
      font-weight: 600;
      margin-bottom: 5px;
    }
    .contact .info p {
      padding: 0 0 10px 60px;
      margin-bottom: 20px;
      font-size: 14px;
    }
    .contact .info .email p {
      padding-top: 5px;
    }
    .contact .info .social-links {
      padding-left: 60px;
    }
    .contact .info .social-links a {
      font-size: 18px;
      display: inline-block;
      background: #333;
      color: #fff;
      line-height: 1;
      padding: 8px 0;
      border-radius: 50%;
      text-align: center;
      width: 36px;
      height: 36px;
      transition: 0.3s;
      margin-right: 10px;
    }
    .contact .info .social-links a:hover {
      background: #24b7a4;
      color: #fff;
    }
    .contact .info .email:hover i, .contact .info .address:hover i, .contact .info .phone:hover i {
      background: #24b7a4;
      color: #fff;
    }
    .contact .php-email-form {
      width: 100%;
      border-top: 3px solid #24b7a4;
      border-bottom: 3px solid #24b7a4;
      padding: 30px;
      background: rgba(255, 255, 255, 0.06);
      box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);
    }
    .contact .php-email-form .form-group {
      padding-bottom: 8px;
    }
    .contact .php-email-form .validate {
      display: none;
      color: red;
      margin: 0 0 15px 0;
      font-weight: 400;
      font-size: 13px;
    }
    .contact .php-email-form .error-message {
      display: none;
      color: #fff;
      background: #ed3c0d;
      text-align: left;
      padding: 15px;
      font-weight: 600;
    }
    .contact .php-email-form .error-message br + br {
      margin-top: 25px;
    }
    .contact .php-email-form .sent-message {
      display: none;
      color: #fff;
      background: #18d26e;
      text-align: center;
      padding: 15px;
      font-weight: 600;
    }
    .contact .php-email-form .loading {
      display: none;
      background: #fff;
      text-align: center;
      padding: 15px;
    }
    .contact .php-email-form .loading:before {
      content: "";
      display: inline-block;
      border-radius: 50%;
      width: 24px;
      height: 24px;
      margin: 0 10px -6px 0;
      border: 3px solid #18d26e;
      border-top-color: #eee;
      -webkit-animation: animate-loading 1s linear infinite;
      animation: animate-loading 1s linear infinite;
    }
    .contact .php-email-form input, .contact .php-email-form textarea {
      border-radius: 0;
      box-shadow: none;
      font-size: 14px;
    }
    .contact .php-email-form input {
      height: 44px;
    }
    .contact .php-email-form textarea {
      padding: 10px 12px;
    }
    .contact .php-email-form button[type=submit] {
      background: #24b7a4;
      border: 0;
      padding: 10px 24px;
      color: #fff;
      transition: 0.4s;
      border-radius: 50px;
    }
    .contact .php-email-form button[type=submit]:hover {
      background: #36d8c3;
    }
    @-webkit-keyframes animate-loading {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }
    @keyframes animate-loading {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }

    /*--------------------------------------------------------------
    # Footer
    --------------------------------------------------------------*/

</style>
  <!-- =======================================================
  * Template Name: Maundy - v4.6.0
  * Template URL: https://bootstrapmade.com/maundy-free-coming-soon-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center">

      <img class="logo_light mb-5" src="/upload/logos/savoywhite.png" alt="logo" />
      <h2>We're working hard to improve our website and we'll ready to launch after</h2>
      <div class="countdown d-flex justify-content-center" data-count="{{\Carbon\Carbon::today()->addDays(3)->format('Y/m/d')}}">
        <div>
          <h3>%d</h3>
          <h4>Days</h4>
        </div>
        <div>
          <h3>%h</h3>
          <h4>Hours</h4>
        </div>
        <div>
          <h3>%m</h3>
          <h4>Minutes</h4>
        </div>
        <div>
          <h3>%s</h3>
          <h4>Seconds</h4>
        </div>
      </div>

      {{-- <div class="subscribe">
        <h4>Subscribe now to get the latest updates!</h4>
        <form action="forms/notify.php" method="post" role="form" class="php-email-form">
          <div class="subscribe-form">
            <input type="email" name="email" required><input type="submit" value="Subscribe">
          </div>
          <div class="mt-2">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your notification request was sent. Thank you!</div>
          </div>
        </form>
      </div> --}}

      <div class="row mt-5 mb-3">
          <div class="col text-center">
                  <p><i class="ti-world"></i> Integrated Brand Delivery LTD Savoy Catering Supplies</p>        
                  <p> <i class="ti-mobile"></i> 01493 855403 | <i class="ti-email"></i> sales@savoycatering.co.uk</p>
                  <p><i class="ti-location-pin"></i>Savoy Catering Supplies S Denes Rd, Great Yarmouth <br> NR30 3PR, United Kingdom</p>  
          </div>
      </div>

      <div class="social-links text-center">
        <a href="https://www.facebook.com/SavoyCateringSupplies" class="twitter"><i class="ion-social-twitter"></i></a>
        <a href="https://twitter.com/savoyfoods" class="facebook"><i class="ion-social-facebook"></i></a>
        <a href="https://www.youtube.com/channel/UCSQ4XEn7Ur5nVs08uMKYpLQ/ " class="instagram"><i class="ion-social-youtube"></i></a>
        <a href="https://www.linkedin.com/company/savoy-catering-supplies/" class="linkedin"><i class="ion-social-linkedin"></i></a>
      </div>


    </div>
  </header><!-- End #header -->

    <!-- ======= Footer ======= -->
  <!-- Vendor JS Files -->
  <script src="/customer_assets/bootstrap/js/bootstrap.min.js"></script> 

  <!-- Template Main JS File -->
  <script>
      /**
* Template Name: Maundy - v4.6.0
* Template URL: https://bootstrapmade.com/maundy-free-coming-soon-bootstrap-theme/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Countdown timer
   */
  let countdown = select('.countdown');
  const output = countdown.innerHTML;

  const countDownDate = function() {
    let timeleft = new Date(countdown.getAttribute('data-count')).getTime() - new Date().getTime();

    let days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
    let hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

    countdown.innerHTML = output.replace('%d', days).replace('%h', hours).replace('%m', minutes).replace('%s', seconds);
  }
  countDownDate();
  setInterval(countDownDate, 1000);

})()
  </script>

</body>

</html>