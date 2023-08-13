<div class="full-width-header header-style2 ">
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
                        @if (Route::has('login'))
                            <ul class="topbar-right">
                                <li class="login-register">
                                    @auth
                                        <a href="" >{{Auth::user()->name}}</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                </li>
                            </ul>
                        @else
                            <ul class="topbar-right">
                                <li class="login-register">
                                    <i class="fa fa-sign-in"></i>
                                    <a href="{{route('login')}}">Login</a> /
                                    <a href="{{route('register')}}">Register</a>
                                </li>
                            </ul>
                        @endauth
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar Area End -->

        <!-- Menu Start -->
        <div class="menu-area menu-sticky" style="background: #273c66!important;">
            <div class="container-fluid">
                <div class="row y-middle">
                    <div class="col-lg-4">
                        <div class="logo-cat-wrap">
                            <div class="logo-part pr-90">
                                <a href="{{route('home')}}">
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
                                            <a href="{{route('home')}}">Home</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#" style="color: #fff;">Courses</a>
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
                                            <i class="flaticon-search" style="color: #fff!important;"></i>
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
