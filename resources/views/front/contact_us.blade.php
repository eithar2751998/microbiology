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
                <ul>
                    <li>
                        <a class="active" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="text-capitalize">Contact Us</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Intro Courses -->
        <div class="rs-testimonial style3 mt-60" id="reviews">
            <div class="container">
                <div class="sec-title mb-60 text-center md-mb-30">
                    <div class="sub-title primary">Contact Us</div>
                </div>
                <form action="{{ route("send_contact_us") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input  class="form-control" type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input  class="form-control" type="email" name="email" required>

                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" name="content" id="message" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-30">Submit</button>
                </form>
            </div>
        </div>
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
