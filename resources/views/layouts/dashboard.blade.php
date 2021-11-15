<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex"/>
    <title>Dashboard | {{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <!-- Fonts -->
    @include('layouts.vito.dark')
</head>
<body style="background: #1D203F;">
    <div>
        <div id="admin">
            <admin ></admin>
        </div>
    </div>
</body> 
    <script src="{{ asset('vendors/vito/js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/vito/js/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/vito/js/bootstrap.min.js') }}"></script>
      <!-- Appear JavaScript -->
    <script src="{{ asset('vendors/vito/js/jquery.appear.js') }}"></script>
      <!-- Countdown JavaScript -->
    <script src="{{ asset('vendors/vito/js/countdown.min.js') }}"></script>
      <!-- Counterup JavaScript -->
    <script src="{{ asset('vendors/vito/js/waypoints.min.j') }}s"></script>
    <script src="{{ asset('vendors/vito/js/jquery.counterup.min.js') }}"></script>
      <!-- Wow JavaScript -->
    <script src="{{ asset('vendors/vito/js/wow.min.js') }}"></script>
      <!-- Apexcharts JavaScript -->
    <script src="{{ asset('vendors/vito/js/apexcharts.js') }}"></script>
      <!-- Slick JavaScript -->
    <script src="{{ asset('vendors/vito/js/slick.min.js') }}"></script>
      <!-- Select2 JavaScript -->
    <script src="{{ asset('vendors/vito/js/select2.min.js') }}"></script>
      <!-- Owl Carousel JavaScript -->
    <script src="{{ asset('vendors/vito/js/owl.carousel.min.js') }}"></script>
      <!-- Magnific Popup JavaScript -->
    <script src="{{ asset('vendors/vito/js/jquery.magnific-popup.min.js') }}"></script>
      <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ asset('vendors/vito/js/smooth-scrollbar.js') }}"></script>
      <!-- lottie JavaScript -->
    <script src="{{ asset('vendors/vito/js/lottie.js') }}"></script>
      <!-- am core JavaScript -->
    <script src="{{ asset('vendors/vito/js/core.js') }}"></script>
      <!-- am charts JavaScript -->
    <script src="{{ asset('vendors/vito/js/charts.js') }}"></script>
      <!-- am animated JavaScript -->
    <script src="{{ asset('vendors/vito/js/animated.js') }}"></script>
      <!-- am kelly JavaScript -->
    <script src="{{ asset('vendors/vito/js/kelly.js') }}"></script>
      <!-- am maps JavaScript -->
    <script src="{{ asset('vendors/vito/js/maps.js') }}"></script>
      <!-- am worldLow JavaScript -->
    <script src="{{ asset('vendors/vito/js/worldLow.js') }}"></script>
      <!-- Chart Custom JavaScript -->
    <script src="{{ asset('vendors/vito/js/chart-custom.js') }}"></script>
      <!-- Custom JavaScript -->
    <script src="{{ asset('vendors/vito/js/custom.js') }}"></script>


    <script src="{{ asset('admin/dashboard/js/admin.js') }}" defer></script>



</html>
