<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>NewBiz Bootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{asset('frontend/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('frontend/assets/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('frontend/assets/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: NewBiz
    Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
  Header
  ============================-->
 <!-- #header -->
@include('Home_page.body.header');
  <!--==========================
    Intro Section
  ============================-->
  @include('Home_page.Intro');
 <!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    @include('Home_page.about');
  <!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    @include('Home_page.services');
   <!-- #services -->

    <!--==========================
      Why Us Section
    ============================-->
  @include('Home_page.whyUs')

    <!--==========================
      Portfolio Section
    ============================-->
    @include('Home_page.portfolio')
   <!-- #portfolio -->

    <!--==========================
      Testimonials Section
    ============================-->
    @include('Home_page.testimonials')
    <!-- #testimonials -->

    <!--==========================
      Team Section
    ============================-->
    @include('Home_page.team')
 <!-- #team -->

    <!--==========================
      Clients Section
    ============================-->
   @include('Home_page.clients')

    <!--==========================
      Contact Section
    ============================-->
    @include('Home_page.contact')
  <!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  @include('Home_page.body.footer')
 <!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="{{asset('frontend/assets/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/assets/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('frontend/assets/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/assets/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('frontend/assets/lib/mobile-nav/mobile-nav.js')}}"></script>
  <script src="{{asset('frontend/assets/lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('frontend/assets/lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('frontend/assets/lib/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('frontend/assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/assets/lib/isotope/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('frontend/assets/lib/lightbox/js/lightbox.min.js')}}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="{{asset('frontend/assets/js/main.js')}}"></script>

</body>
</html>
