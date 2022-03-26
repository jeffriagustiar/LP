
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from admin.pixelstrap.com/viho/theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2022 08:00:22 GMT -->
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

    @stack('before-style')
    @include('includes.style')
    @stack('')

  </head>
  <body class="dark-only">
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start       -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

      <!-- Page Header Start-->
      @include('includes.header')
      <!-- Page Header Ends-->
      
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">

        <!-- Page Sidebar Start-->
        @include('includes.sidebar')
        <!-- Page Sidebar Ends-->

        <div class="page-body">
          <!-- Container-fluid starts-->
          @yield('conten')
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        @include('includes.footer')
        <!-- footer end-->
      </div>
    </div>
    <!-- latest jquery-->
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
    <!-- Plugin used-->
  </body>

<!-- Mirrored from admin.pixelstrap.com/viho/theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2022 08:01:44 GMT -->
</html>