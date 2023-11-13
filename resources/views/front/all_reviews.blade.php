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
                <h1 class="page-title">All Reviews</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('home')}}"> Home </a>
                    </li>
                    <li>All Reviews</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Start Reviews  -->
        <div class="rs-testimonial style3 mt-60" id="reviews">
            <div class="container-fluid">
                <div class="sec-title mb-60 text-center md-mb-30">
                    <div class="sub-title primary">Student Reviews</div>
                    <h2 class="title mb-0">What Our Students Says</h2>
                </div>
{{--                <div class="rs-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="2" data-md-device-nav="false" data-md-device-dots="true">--}}
                <div class="row justify-content-center mb-60">
                    @foreach($reviews as $review)
                        <div class="testi-item col-md-3 mx-4 my-4">
                            <div class="row y-middle no-gutter">
                                <div class="col-md-4">
                                    <div class="user-info">
                                        <img src="{{asset('assets/front/images/testimonial/style3/1.png')}}" alt="">
                                        <h4 class="name">{{ $review->user->name }}</h4>
                                        <span class="designation">Student</span>
{{--                                        <ul class="ratings">--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                            <li><i class="fa fa-star"></i></li>--}}
{{--                                        </ul>--}}
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="desc">{{ $review->content }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        {{ $reviews->links() }}
                </div>
                <div class="btn-part text-center mb-30">
                    <a class="readon3 dark-hov" href="{{route('reviews.create')}}">Add Review</a>
                </div>
{{--                </div>--}}
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
