<div class="topbar">
    <!-- Start row -->
    <div class="row align-items-center">
        <!-- Start col -->
        <div class="col-md-12 align-self-center">
            <div class="togglebar">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <div class="menubar">
                            <a class="menu-hamburger" href="#">
                                <img src="{{asset('assets/dashboard/images/svg-icon/collapse.svg')}}" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                <img src="{{asset('assets/dashboard/images/svg-icon/close.svg')}}" class="img-fluid menu-hamburger-close" alt="close">
                            </a>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="searchbar">
                            <form action="{{route('dashboard.search')}}" method="get">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" name="query" id="query" value="{{ request()->input('query') }}">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit" id="button-addon2"><img src="{{asset('assets/dashboard/images/svg-icon/search.svg')}}" class="img-fluid" alt="search"></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="infobar">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <div class="notifybar">
                            <a href="javascript:void(0)" id="infobar-notifications-open" class="infobar-icon">
                                <img src="{{asset('assets/dashboard/images/svg-icon/email.svg')}}" class="img-fluid" alt="notifications">
                                <span class="live-icon"></span>
                            </a>
                        </div>
                    </li>


                    <div id="infobar-notifications-sidebar" class="infobar-notifications-sidebar">
                        <div class="infobar-notifications-sidebar-head d-flex w-100 justify-content-between">
                            <h4>Contacts</h4><a href="javascript:void(0)" id="infobar-notifications-close" class="infobar-notifications-close"><img src="{{asset('assets/dashboard/images/svg-icon/close.svg')}}" class="img-fluid menu-hamburger-close" alt="close"></a>
                        </div>
                        <div class="infobar-notifications-sidebar-body">
                            <div class="tab-content" id="infobar-pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-messages" role="tabpanel" aria-labelledby="pills-messages-tab">
                                    <ul class="list-unstyled">
{{--                                        @foreach($contacts as $contact)--}}
{{--                                            <li class="media">--}}
{{--                                                <img class="mr-3 align-self-center rounded-circle" src="{{asset('assets/dashboard/images/users/user.svg')}}" alt="Generic placeholder image">--}}
{{--                                                <div class="media-body">--}}
{{--                                                    <h5>--}}
{{--                                                        {{$contact->name}}--}}
{{--                                                        <span class="timing">{{$contact->created_at->format('d/m/y')}}</span>--}}
{{--                                                    </h5>--}}
{{--                                                    <p>{{$contact->subject}}</p>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                        @endforeach--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </ul>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
