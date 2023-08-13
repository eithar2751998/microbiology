
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
                    <h1 class="page-title">Courses</h1>
                    <ul>
                        <li>
                            <a class="active" href="{{route('home')}}"> Home </a>
                        </li>
                        <li>Course</li>
                    </ul>
                </div>
            </div>
            <!-- Breadcrumbs End -->

          <!-- Popular Courses Section Start -->
          <div id="rs-popular-courses" class="rs-popular-courses style4 orange-color pt-110 pb-120 md-pt-70 md-pb-80">
              <div class="container">
                  <div class="row">
                      @foreach($courses as $course)
                          <div class="col-lg-4 col-md-6 mb-30">
                              <div class="courses-item">
                                  <div class="img-part">
                                      <img src="{{asset('departments/'.$course->name.'/'.$course->image)}}" alt="" style="width: 358px; height: 220px">
                                  </div>
                                  <div class="content-part">
                                      <h3 class="title"><a href=""> {{$course->name}} </a></h3>
                                      <div class="bottom-part">
                                          <div class="btn-part">
                                              <a href="{{ route('front.course.subjects', $course->id) }}">Topics<i class="flaticon-right-arrow"></i></a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                  </div>
              </div>
          </div>
          <!-- Popular Courses Section End -->


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
