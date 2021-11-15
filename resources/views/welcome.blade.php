<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta_tags')
    
    <link href="{{ asset('favicon.png') }}" rel="icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

  

    @include('layouts.arsha.styles')
    {{--     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
 --}}    

   

    <style type="text/css">
        .logo{
            color: #369b8b!important;
        }
    </style>
    
    </head>
    <body style="font-display: 'verdana';">

      
          @include('web.structure.navbar')
          

          @yield("hero")
          <!-- End Hero -->
          <main id="main">
              
                    @yield("content")
             
          </main>
         
         
          <!-- End #main -->

  <!-- ======= Footer ======= -->
          @include('web.structure.footer')
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



  </body>



  @include('layouts.arsha.scripts')
    
</html>
