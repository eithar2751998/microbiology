<!-- Start Leftbar -->
<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="#" class="logo logo-large"><img src="{{asset('assets\dashboard\images\logoadmin.png')}}" class="img-fluid" alt="logo"></a>
            <a href="" class="logo logo-small"><img src="{{asset('assets/dashboard/images/smalllogo.png')}}" class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Profilebar -->
        <div class="profilebar text-center">
            <img src="{{asset('assets/dashboard/images/users/profile.svg')}}" class="img-fluid" alt="profile">
            <div class="profilename">
                <h5 class="text-white"></h5>
            </div>
            <div class="userbox">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="{{route('dashboard.admin.profile')}}" class="profile-icon"><img src="{{asset('assets/dashboard/images/svg-icon/user.svg')}}" class="img-fluid" alt="user"></a></li>
{{--                    <li class="list-inline-item"><a href="#" class="profile-icon"><img src="{{asset('assets/dashboard/images/svg-icon/email.svg')}}" class="img-fluid" alt="email"></a></li>--}}
                    <li class="list-inline-item"><a href="#"  onclick="event.preventDefault()
                                                    document.querySelector('#logout-form').submit();"
                                                    class="profile-icon"><img src="{{asset('assets/dashboard/images/svg-icon/logout.svg')}}" class="img-fluid" alt="logout"></a></li>
                    <form id="logout-form" action="{{route('dashboard.logout')}}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
        <!-- End Profilebar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="{{route('dashboard.home')}}">
                        <img src="{{asset('assets/dashboard/images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="dashboard"><span>Dashboard</span>
                    </a>
                </li>
                @if(\App\Models\About::all()->count() < 1)
                    <li>
                        <a href="{{route('dashboard.about.create')}}">
                            <img src="{{asset('assets/dashboard/images/svg-icon/info.png')}}" class="img-fluid" alt="about"><span>About</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{route('dashboard.about.index')}}">
                            <img src="{{asset('assets/dashboard/images/svg-icon/info.png')}}" class="img-fluid" alt="about"><span>About</span>
                        </a>
                    </li>
                @endif


                <li>
                    <a href="{{route('dashboard.admins.index')}}">
                        <img src="{{asset('assets/dashboard/images/svg-icon/user.svg')}}" class="img-fluid" alt="layouts"><span>Admins</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.dept.index')}}">
                        <img src="{{asset('assets/dashboard/images/svg-icon/components.svg')}}" class="img-fluid" alt="layouts"><span>Courses</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.subjects.index')}}">
                        <img src="{{asset('assets/dashboard/images/svg-icon/form_elements.svg')}}" class="img-fluid" alt="layouts"><span>Topics</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.events.index')}}">
                        <img src="{{asset('assets/dashboard/images/svg-icon/events.png')}}" class="img-fluid" alt="layouts"><span>Events</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.coming.index')}}">
                        <img src="{{asset('assets/dashboard/images/svg-icon/coming-soon.png')}}" class="img-fluid" alt="layouts"><span>Comings Soon</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.question.index')}}">
                        <img src="{{asset('assets/dashboard/images/svg-icon/question-mark.png')}}" class="img-fluid" alt="layouts"><span>Questions</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.question.free')}}">
                        <img src="{{asset('assets/dashboard/images/svg-icon/conversation.png')}}" class="img-fluid" alt="layouts"><span>Free Questions</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.pricing.index')}}">
                        <img src="{{asset('assets/dashboard/images/svg-icon/price.png')}}" class="img-fluid" alt="layouts"><span>Pricing Plan</span>
                    </a>
                </li>

                <li>
                    <a>
                        <img src="{{asset('assets/dashboard/images/svg-icon/group.svg')}}" class="img-fluid" alt="users"><span>User Management</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="{{route('dashboard.roles.index')}}"><i class="mdi mdi-circle"></i>Roles</a>

                            <a href="{{route('dashboard.permissions.index')}}" ><i class="mdi mdi-circle"></i>Permissions</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
<!-- End Leftbar -->
