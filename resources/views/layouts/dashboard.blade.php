<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Theta is a bootstrap & laravel admin dashboard template">
        <meta name="keywords" content="admin, admin dashboard, admin panel, admin template, analytics, bootstrap 4, crm, laravel admin, responsive, sass support, ui kits">
        <meta name="author" content="Themesbox17">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admin panel</title>
        <!-- Fevicon -->
        <link rel="shortcut icon" href="{{asset('assets/dashboard/images/smalllogo.png')}}">
        <!-- Start CSS -->
        @yield('styles')
        <!-- Datepicker css -->
        <link href="{{asset('assets/dashboard/plugins/datepicker/datepicker.min.css')}}" rel="stylesheet" type="text/css">

        <link href="{{asset('assets/dashboard/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/dashboard/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/dashboard/css/flag-icon.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/dashboard/plugins/switchery/switchery.min.css')}}" rel="stylesheet">

        <!-- Code Mirror css -->
        <link href="{{asset('assets/dashboard/plugins/code-mirror/codemirror.css')}}" rel="stylesheet">
        <link href="{{asset('assets/dashboard/css/style.css')}}" rel="stylesheet" type="text/css">
    <!-- End css -->
    </head>

    <body class="vertical-layout">

        @include('dashboard.includes.navbar')
        <div id="containerbar">
        @include('dashboard.includes.sidebar')
            <div class="rightbar">
                @yield('content')
            </div>
        </div>
        @include('dashboard.includes.footer')
        <script src="{{asset('assets/dashboard/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/dashboard/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/dashboard/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/dashboard/js/modernizr.min.js')}}"></script>
        <script src="{{asset('assets/dashboard/js/detect.js')}}"></script>
        <script src="{{asset('assets/dashboard/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('assets/dashboard/js/vertical-menu.js')}}"></script>

        <script src="{{asset('assets/dashboard/plugins/switchery/switchery.min.js')}}"></script>
        @yield('scripts')
        <!-- Morris Chart js -->
        <script src="{{asset('assets/dashboard/plugins/morris/morris.min.js')}}"></script>
        <script src="{{asset('assets/dashboard/plugins/code-mirror/codemirror.js')}}"></script>
        <script src="{{asset('assets/dashboard/plugins/code-mirror/htmlmixed.js')}}"></script>
        <script src="{{asset('assets/dashboard/plugins/code-mirror/css.js')}}"></script>
        <script src="{{asset('assets/dashboard/plugins/code-mirror/javascript.js')}}"></script>
        <script src="{{asset('assets/dashboard/plugins/code-mirror/xml.js')}}"></script>
        <!-- Dashboard js -->
        <script src="{{asset('assets/dashboard/js/custom/custom-dashboard-analytics.js')}}"></script>

        <script src="{{asset('assets/dashboard/js/bootstrap.bundle.min.js')}}" ></script>
        <!-- Core js -->
        <script src="{{asset('assets/dashboard/js/core.js')}}"></script>

<!-- End js -->
    </body>

</html>
