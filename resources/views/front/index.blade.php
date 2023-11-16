@extends('layouts.home')
@section('content')

    @include('front.includes.navbar')
    <!--Full width header End-->

    <!-- Main content Start -->
    <div class="main-content">
        <!-- Slider Section Start -->
        <div class="rs-slider main-home">
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="6" data-margin="0" data-autoplay="true"
                 data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false"
                 data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="1"
                 data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false"
                 data-md-device="1" data-md-device-nav="true" data-md-device-dots="false">
                <div class="slider-content slide1">
                    <div class="container">
                        <div class="content-part">
                            <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                                <a class="readon orange-btn main-home float-left" style="margin-top: 250px" href="{{route('front.course.index')}}">Find Courses</a>                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-content slide2">
                    <div class="container">
                        <div class="content-part">
                            <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                                <a class="readon orange-btn main-home float-left" style="margin-top: 250px" href="{{route('front.course.index')}}">Find Courses</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-content slide3">
                    <div class="container">
                        <div class="content-part">
                            <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                                <a class="readon orange-btn main-home float-left" style="margin-top: 250px" href="{{route('front.course.index')}}">Find Courses</a>                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-content slide4">
                    <div class="container">
                        <div class="content-part">
                            <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                                <a class="readon orange-btn main-home float-left" style="margin-top: 250px" href="{{route('front.course.index')}}">Find Courses</a>                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-content slide5">
                    <div class="container">
                        <div class="content-part">
                            <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                                <a class="readon orange-btn main-home float-left" style="margin-top: 250px" href="{{route('front.course.index')}}">Find Courses</a>                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-content slide6">
                    <div class="container">
                        <div class="content-part">
                            <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                                <a class="readon orange-btn main-home float-left" style="margin-top: 250px" href="{{route('front.course.index')}}">Find Courses</a>                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Section End -->

        <!-- About Section Start -->
        <div id="rs-about" class="rs-about style3 pt-100 md-pt-70">
            <div class="container">
                <div class=" y-middle">
                    <div class="col-lg-12 lg-pr-0 md-mb-30">
                        <div class="about-intro">
                            <div class="sec-title text-center md-mb-30">
                                <div class="sub-title primary">About Us</div>
                                <h2 class="title mb-21">{{ $about->header }}</h2>
                            </div>
                            <div class="desc big text-justify">{!! $about->content !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Section End -->

        <!-- courses Section Start -->
        <div class="rs-subject style1 pt-94 pb-70 md-pt-64 md-pb-40" id="courses">
            <div class="container">
                <div class="sec-title mb-60 text-center md-mb-30">
                    <div class="sub-title primary ">Courses</div>
                    <h2 class="title mb-0">Our Top Courses</h2>
                </div>
                <div class="row">
                @foreach($courses as $course)
                        <div class="col-lg-4 col-md-6 mb-30">
                            <div class="subject-wrap bgc1">
                                <img style="width: 142px;height: 117px" class="rounded-circle" src="{{asset('department/'.$course->name.'/'.$course->image)}}" alt="">
                                <h4 class="title text-capitalize"><a href="#">{{$course->name}}</a></h4>
                                <span class="course-qnty text-capitalize">
                                @if($course->subjects()->count()<10)
                                        0{{$course->subjects()->count()}} Topics
                                    @else
                                        {{$course->subjects()->count()}} Topics
                                    @endif
                            </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="btn-part text-center mt-30">
                    <a class="readon3 dark-hov" href="{{route('front.course.index')}}">View All Courses</a>
                </div>
            </div>
        </div>
        <!-- Subject Categories Section End -->

        <!-- coming soon  Section Start -->
        <div class="rs-popular-courses style2 pt-94 pb-200 md-pt-64 md-pb-90" id="coming_soon">
            <div class="container">
                <div class="sec-title mb-60 text-center md-mb-30">
                    <div class="sub-title primary text-capitalize">Top Coming Soon</div>
                    <h2 class="title mb-0 text-capitalize">Popular coming soon</h2>
                </div>
                <div class="row">
                    @foreach($comingSoons as $comingSoon)
                        <div class="col-lg-4 col-md-6 mb-30">
                            <div class="course-wrap">
                                <div class="front-part">
                                    <div class="img-part">
                                        <img style="width: 262px; height: 291px;" src="{{asset('comingSoon/'.$comingSoon->title.'/'.$comingSoon->image)}}" alt="">
                                    </div>
                                    <div class="content-part">
                                        {{--                                <a class="categorie" href="#">Web Development</a>--}}
                                        <h4 class="title"><a href="course-single.html">{{$comingSoon->title}}</a></h4>
                                    </div>
                                </div>
                                <div class="inner-part">
                                    <div class="content-part">
                                        <h4 class="title"><a href=""></a></h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        <!-- Popular Course Section End -->

        <!-- reviews Section Start -->
        <div class="rs-testimonial style3" id="reviews">
            <div class="container">
                <div class="sec-title mb-60 text-center md-mb-30">
                    <div class="sub-title primary">Student Reviews</div>
                    <h2 class="title mb-0">What Our Students Says</h2>
                </div>
                <div class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="2" data-md-device-nav="false" data-md-device-dots="true">
                    @foreach($reviews as $review)
                        <div class="testi-item">
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
                </div>
            </div>
            <div class="btn-part text-center  mt-30">
                <a class="readon3 dark-hov" href="{{route('reviews.create')}}">Add Review</a>
            </div>
        </div>

        <!-- Testimonial Section End -->

        <!-- events Section Start -->
        <div id="rs-blog" class="rs-blog style1 modify1 pt-85 pb-100 md-pt-70 md-pb-70" id="events">
            <div class="container">
                <div class="sec-title mb-60 md-mb-30 text-center">
                    <div class="sub-title primary text-capitalize">Top Events </div>
                    <h2 class="title mb-0 text-capitalize">Latest  Events</h2>
                </div>
                <div class="row">
                    @foreach($upcomingEvents as $key => $event)
                        <div class="col-lg-7 pr-60 md-pr-15 md-mb-30">
                            @if($key%2 ==0 )
                                <div class="row no-gutter white-bg blog-item mb-35">
                                    <div class="col-md-6">
                                        <div class="image-part">
                                            <a href="#"><img style="width: 303px;height: 240px" src="{{asset('events/'.$event->title.'/'.$event->image)}}" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="blog-content">
                                            <ul class="blog-meta">
                                                <li><i class="fa fa-user-o"></i> Admin</li>
                                                <li><i class="fa fa-calendar"></i>{{Carbon\Carbon::create($event->date)->toFormattedDateString()}}</li>
                                            </ul>
                                            <h3 class="title"><a href="#">{{$event->title}}</a></h3>
                                            <div class="btn-part">
                                                <a class="readon-arrow" href="#">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row no-gutter white-bg blog-item">
                                    <div class="col-md-6 order-last">
                                        <div class="image-part">
                                            <a href="#"><img style="width: 303px;height: 240px" src="{{asset('events/'.$event->title.'/'.$event->image)}}" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="blog-content">
                                            <ul class="blog-meta">
                                                <li><i class="fa fa-user-o"></i> Admin</li>
                                                <li><i class="fa fa-calendar"></i>{{Carbon\Carbon::create($event->date)->toFormattedDateString()}}</li>
                                            </ul>
                                            <h3 class="title"><a href="#">{{$event->title}}</a></h3>
                                            <div class="btn-part">
                                                <a class="readon-arrow" href="#">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                    @foreach($finishedEvents as $event)
                        <div class="col-lg-5 lg-pl-0">
                            <div class="events-short mb-28">
                                <div class="date-part bgc1">
                                    <span class="month">{{Carbon\Carbon::create($event->date)->format('M')}}</span>
                                    <div class="date">{{Carbon\Carbon::create($event->date)->format('d')}}</div>
                                </div>
                                <div class="content-part">
                                    <div class="categorie">
                                        <a href="#">Math</a> & <a href="#">English</a>
                                    </div>
                                    <h4 class="title mb-0"><a href="blog-single.html">Educational Technology and Mobile Accessories Learning</a></h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Blog Section End -->
    </div>


@endsection

@section('footer')
    @include('front.includes.footer')
@endsection

@section('scripts')

@endsection


