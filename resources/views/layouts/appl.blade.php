<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from admin.pixelstrap.com/viho/theme/landing-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2022 08:02:13 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ url('/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('/assets/images/favicon.png') }}" type="image/x-icon">
    <title>@yield('title')</title>

    @include('includes.landing.style')
    
  </head>
  <body class="landing-wrraper">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper landing-page">
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- header start-->
        @include('includes.landing.header')
        <!-- header end-->

        @yield('conten')
        
        <!--footer start-->
        @include('includes.landing.footer')
        <!--footer end-->
      </div>
    </div>
    @include('includes.landing.script')
    <!-- Plugin used-->
  </body>

<!-- Mirrored from admin.pixelstrap.com/viho/theme/landing-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2022 08:02:55 GMT -->
</html>