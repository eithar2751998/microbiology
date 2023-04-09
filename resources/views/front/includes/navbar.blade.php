<div class="full-width-header header-style2 modify1">
    <!--Header Start-->
    <header id="rs-header" class="rs-header">
        <!-- Topbar Area Start -->
        <div class="topbar-area ">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-md-6">
                        <ul class="topbar-contact">
                            <li>
                                <i class="flaticon-email"></i>
                                <a href="mailto:support@rstheme.com">support@rstheme.com</a>
                            </li>
                            <li>
                                <i class="flaticon-call"></i>
                                <a href="tel:+0885898745">(+088) 589-8745</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 text-right">
                        <ul class="topbar-right">
                            <li class="login-register">
                                <i class="fa fa-sign-in"></i>
                                <a href="#">Login</a> /
                                <a href="#">Register</a>
                            </li>
{{--                            <li class="btn-part">--}}
{{--                                <a class="apply-btn" href="#">Apply Now</a>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar Area End -->

        <!-- Menu Start -->
        <div class="menu-area menu-sticky">
            <div class="container-fluid">
                <div class="row y-middle">
                    <div class="col-lg-4">
                        <div class="logo-cat-wrap">
                            <div class="logo-part pr-90">
                                <a href="{{url('/')}}">
                                    <img src="{{asset('assets/front/images/logo.png')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 text-center">
                        <div class="rs-menu-area">
                            <div class="main-menu pr-90 md-pr-15">
                                <div class="mobile-menu">
                                    <a class="rs-menu-toggle">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </div>
                                <nav class="rs-menu">
                                    <ul class="nav-menu">
                                        <li class="rs-mega-menu mega-rs  current-menu-item">
                                            <a href="{{url('/')}}">Home</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Courses</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item-has-children right">
                                                    @foreach($courses as $course)
                                                    <a href="#">{{$course->name}}</a>
                                                    <ul class="sub-menu right">
                                                        @foreach($course->subjects()->paginate(3) as $topic)
                                                        <li><a href="#">{{$topic->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                    @endforeach
                                                </li>
                                            </ul>
                                        </li>
                                    </ul> <!-- //.nav-menu -->
                                </nav>
                            </div> <!-- //.main-menu -->
                            <div class="expand-btn-inner">
                                <ul>
                                    <li>
                                        <a class="hidden-xs rs-search " data-target=".search-modal" data-toggle="modal" href="#">
                                            <i class="flaticon-search"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->
    </header>
    <!--Header End-->
</div>
