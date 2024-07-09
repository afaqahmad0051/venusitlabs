<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>VenusItLabs | Admin Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/core/libs.min.css')}}" />

    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/aos/dist/aos.css')}}" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/hope-ui.min.css?v=1.2.0')}}" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/custom.min.css?v=1.2.0')}}" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/dark.min.css')}}" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/customizer.min.css')}}" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/rtl.min.css')}}" />

</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->
    {{-- sidebar --}}
    @include('admin.body.sidebar')

    <main class="main-content">
        {{-- header --}}
        @include('admin.body.header')


        @yield('content')
     

        <!-- Footer Section Start -->
        @include('admin.body.footer')
        <!-- Footer Section End -->
    </main>

    <!-- Wrapper End-->

    <!-- Library Bundle Script -->
    <script src="{{asset('backend/assets/js/core/libs.min.js')}}"></script>

    <!-- External Library Bundle Script -->
    <script src="{{asset('backend/assets/js/core/external.min.js')}}"></script>

    <!-- Widgetchart Script -->
    <script src="{{asset('backend/assets/js/charts/widgetcharts.js')}}"></script>

    <!-- mapchart Script -->
    <script src="{{asset('backend/assets/js/charts/vectore-chart.js')}}"></script>
    <script src="{{asset('backend/assets/js/charts/dashboard.js')}}"></script>

    <!-- fslightbox Script -->
    <script src="{{asset('backend/assets/js/plugins/fslightbox.js')}}"></script>

    <!-- Settings Script -->
    <script src="{{asset('backend/assets/js/plugins/setting.js')}}"></script>

    <!-- Slider-tab Script -->
    <script src="{{asset('backend/assets/js/plugins/slider-tabs.js')}}"></script>

    <!-- Form Wizard Script -->
    <script src="{{asset('backend/assets/js/plugins/form-wizard.js')}}"></script>

    <!-- AOS Animation Plugin-->
    <script src="{{asset('backend/assets/vendor/aos/dist/aos.js')}}"></script>

    <!-- App Script -->
    <script src="{{asset('backend/assets/js/hope-ui.js')}}" defer></script>
</body>

</html>