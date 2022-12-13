<!DOCTYPE html>
<html lang="ar">

<!-- Mirrored from maanjaa.com/themeger/katen-demo/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Oct 2021 17:00:33 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
    <title>Katen - Minimal Blog & Magazine HTML Theme</title>
    <meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/front/images/favicon.png')}}">

    <!-- STYLES -->
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('assets/front/css/all.min.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('assets/front/css/slick.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('assets/front/css/simple-line-icons.css')}}" type="text/css" media="all">
    @yield('styles')
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}" type="text/css" media="all">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
{{--@include('front.includes.preloader')--}}
<div class="site-wrapper">
    @include('front.includes.navbar')
    @yield('content')
    @include('front.includes.footer')
</div>
@include('front.includes.search')
@include('front.includes.canvas_menu')

<body dir="{{(App::isLocale('ar') ? 'rtl' : 'rtl')}}">

<!-- JAVA SCRIPTS -->
<script src="{{asset('assets/front/js/jquery.min.js')}}"></script>

<script src="{{asset('assets/front/js/popper.min.js')}}"></script>

<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/js/slick.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.sticky-sidebar.min.js')}}"></script>
@yield('scripts')
<script src="{{asset('assets/front/js/custom.js')}}"></script>

</body>

<!-- Mirrored from maanjaa.com/themeger/katen-demo/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Oct 2021 17:00:55 GMT -->
</html>
