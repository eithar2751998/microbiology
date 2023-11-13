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
                <h1 class="page-title">Add Review</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('home')}}"> Home </a>
                    </li>
                    <li>Add Review</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Start Add Review -->
        <div class="rs-testimonial style3 mt-60" id="reviews">
            <div class="container">
                <div class="sec-title mb-60 text-center md-mb-30">
                    <div class="sub-title primary">Student Reviews</div>
                    <h2 class="title mb-0">What Our Students Says</h2>
                </div>
                <form action="{{ route("reviews.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Review</label>
                        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-30">Submit</button>
                </form>
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
