<!doctype html>
<html lang="en">
<head>
    <!-- meta tag -->
    <meta charset="utf-8">
    <title>Microbioilogy</title>
    <meta name="description" content="">
    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/front/images/smalllogo.png')}}">
    <!-- Bootstrap v4.4.1 css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/bootstrap.min.css')}}">
    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/font-awesome.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/animate.css')}}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/owl.carousel.css')}}">
    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/slick.css')}}">
    <!-- off canvas css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/off-canvas.css')}}">
    <!-- linea-font css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/fonts/linea-fonts.css')}}">
    <!-- flaticon css  -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/fonts/flaticon.css')}}">
    <!-- magnific popup css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/magnific-popup.css')}}">
    <!-- Main Menu css -->
    <link rel="stylesheet" href="{{asset('assets/front/css/rsmenu-main.css')}}">
    <!-- spacing css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/rs-spacing.css')}}">
@yield('styles')
<!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/style.css')}}"> <!-- This stylesheet dynamically changed from style.less -->
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/responsive.css')}}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!--Preloader area start here-->
@include('front.includes.preload')
<!--Preloader area End here-->

<!--Full width header Start-->
@include('front.includes.navbar')
<!--Full width header End-->

<!-- Main content Start -->
<div class="main-content">
    @yield('content')
</div>
<!-- Main content End -->

<!-- Footer Start -->
@include('front.includes.footer')
<!-- Footer End -->

<!-- start scrollUp  -->
<div id="scrollUp">
    <i class="fa fa-angle-up"></i>
</div>
<!-- End scrollUp  -->

<!-- Search Modal Start -->
<div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span class="flaticon-cross"></span>
    </button>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="search-block clearfix">
                <form>
                    <div class="form-group">
                        <input class="form-control" placeholder="Search Here..." type="text">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Search Modal End -->

<!-- modernizr js -->
<script src="{{asset('assets/front/js/modernizr-2.8.3.min.js')}}"></script>
<!-- jquery latest version -->
<script src="{{asset('assets/front/js/jquery.min.js')}}"></script>
<!-- Bootstrap v4.4.1 js -->
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<!-- Menu js -->
<script src="{{asset('assets/front/js/rsmenu-main.js')}}"></script>
<!-- op nav js -->
<script src="{{asset('assets/front/js/jquery.nav.js')}}"></script>
<!-- owl.carousel js -->
<script src="{{asset('assets/front/js/owl.carousel.min.js')}}"></script>
<!-- Slick js -->
<script src="{{asset('assets/front/js/slick.min.js')}}"></script>
<!-- isotope.pkgd.min js -->
<script src="{{asset('assets/front/js/isotope.pkgd.min.js')}}"></script>
<!-- imagesloaded.pkgd.min js -->
<script src="{{asset('assets/front/js/imagesloaded.pkgd.min.js')}}"></script>
<!-- wow js -->
<script src="{{asset('assets/front/js/wow.min.js')}}"></script>
<!-- Skill bar js -->
<script src="{{asset('assets/front/js/skill.bars.jquery.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.counterup.min.js')}}"></script>
<!-- counter top js -->
<script src="{{asset('assets/front/js/waypoints.min.js')}}"></script>
<!-- video js -->
<script src="{{asset('assets/front/js/jquery.mb.YTPlayer.min.js')}}"></script>
<!-- magnific popup js -->
<script src="{{asset('assets/front/js/jquery.magnific-popup.min.js')}}"></script>
<!-- parallax-effect js -->
<script src="{{asset('assets/front/js/parallax-effect.min.js')}}"></script>
<!-- plugins js -->
<script src="{{asset('assets/front/js/plugins.js')}}"></script>
<!-- contact form js -->
<script src="{{asset('assets/front/js/contact.form.js')}}"></script>
@yield('scripts')
<!-- main js -->
<script src="{{asset('assets/front/js/main.js')}}"></script>
</body>
</html>
