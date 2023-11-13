@extends('layouts.home')
@section('content')
    <!--Full width header Start-->
    <!--Full width header Start-->
    @include('front.includes.darkNavbar')
    {{--        <!--Full width header End-->--}}

    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset('assets/front/images/breadcrumbs/2.jpg')}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Terms & Conditions</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('home')}}"> Home </a>
                    </li>
                    <li>Terms And Conditions</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->
        <div id="rs-popular-courses" class="rs-popular-courses style4 orange-color pt-110 pb-120 md-pt-70 md-pb-80">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
    </div>
    <!-- Main content End -->
    <!-- start scrollUp  -->
    <div id="scrollUp" class="blue-color">
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
@endsection

@section('footer')
    @include('front.includes.footer')
@endsection
