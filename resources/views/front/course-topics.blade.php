@extends('layouts.home')
@section('content')
    <!--Full width header Start-->
        @include('front.includes.darkNavbar')
    <!--Full width header End-->

<!-- Main content Start -->
<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src="{{asset('assets/front/images/breadcrumbs/2.jpg')}}" alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title"> {{$course->name}} </h1>
            <ul>
                <li>
                    <a class="active" href="{{route('home')}}">Home</a>
                </li>
                <li>
                    <a class="active" href="{{route('front.course.index')}}">Courses</a>
                </li>
                <li class="text-capitalize">{{$course->name}} Topics</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Intro Courses -->
    <section class="intro-section gray-bg pt-94 pb-100 md-pt-64 md-pb-70">
        <div class="container">
            <div class="row clearfix">
                <!-- Content Column -->
                <div class="col-lg-12 md-mb-50">
                    <!-- Intro Info Tabs-->
                    <div class="intro-info-tabs">
                        <div class="tab-content tabs-content" id="myTabContent">
                            <div class="tab-pane tab fade show active" id="prod-overview" role="tabpanel" aria-labelledby="prod-overview-tab">
                                <div class="content white-bg pt-30">
                                    <!-- Cource Overview -->
                                    <div class="course-overview">
                                        <div class="inner-box">
                                            <h2 class="text-capitalize" style="color: #21a7d0"> {{$course->name}} Topics</h2>
                                            <ul class="review-list">
                                                @foreach($courseTopics as $topic)
                                                    <li><a href="" class="text-capitalize">{{ $topic->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- End intro Courses -->

<!-- start scrollUp  -->
<div id="scrollUp" class="orange-color">
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
