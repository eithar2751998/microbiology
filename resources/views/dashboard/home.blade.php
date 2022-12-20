@extends('layouts.dashboard')
@section('content')
            <!-- Start Breadcrumbbar -->
            <div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumbbar -->
            <!-- Start Contentbar -->
            <div class="contentbar">
                    <!-- Start col -->
                    <div class="col-md-12 col-lg-12 ">
                        <div class="row">
                            <div class="col-md-12 col-lg-4">
                                <div class="card m-b-30">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Users</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <p class="dash-analytic-icon"><i class="feather icon-users primary-rgba text-primary"></i></p>
                                                <h3 class="mb-3">{{\App\Models\User::count()}}</h3>
{{--                                                <p class="mb-0"><span class="badge badge-danger-inverse font-16">10%<i class="feather icon-arrow-down-right"></i></span></p>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="card m-b-30">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Roles</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <p class="dash-analytic-icon"><i class="feather icon-users warning-rgba text-warning"></i></p>
                                                <h3 class="mb-3">{{\Spatie\Permission\Models\Role::count()}}</h3>
                                                <p class="mb-0"><span class="badge badge-success-inverse font-16">8%<i class="feather icon-arrow-up-right"></i></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="card m-b-30">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Permissions</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <p class="dash-analytic-icon"><i class="feather icon-share-2 success-rgba text-success"></i></p>
                                                <h3 class="mb-3">{{\Spatie\Permission\Models\Permission::count()}}</h3>
{{--                                                <p class="mb-0"><span class="badge badge-success-inverse font-16">22%<i class="feather icon-arrow-up-right"></i></span></p>--}}
                                            </div>
                                        </div>
                                    </div><i class="fas fa-user-lock"></i>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="card m-b-30">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Admins</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <p class="dash-analytic-icon"><i class="dripicons-user warning-rgba text-warning"></i></p>
                                                <h3 class="mb-3">{{App\Models\Admin::count()}}</h3>
{{--                                                <p class="mb-0"><span class="badge badge-danger-inverse font-16">2%<i class="feather icon-arrow-down-right"></i></span></p>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="card m-b-30">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Courses</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <p class="dash-analytic-icon"><i class="dripicons-network-3 success-rgba text-success"></i></p>
                                                <h3 class="mb-3">{{App\Models\Department::count()}}</h3>
{{--                                                <p class="mb-0"><span class="badge badge-danger-inverse font-16">2%<i class="feather icon-arrow-down-right"></i></span></p>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="card m-b-30">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Topics</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <p class="dash-analytic-icon"><i class="dripicons-blog primary-rgba text-primary"></i></p>
                                                <h3 class="mb-3">{{App\Models\Subject::count()}}</h3>
{{--                                                <p class="mb-0"><span class="badge badge-danger-inverse font-16">2%<i class="feather icon-arrow-down-right"></i></span></p>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="card m-b-30">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Events</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <p class="dash-analytic-icon"><i class="dripicons-calendar success-rgba text-success"></i></p>
                                                <h3 class="mb-3">{{App\Models\Event::count()}}</h3>
{{--                                                <p class="mb-0"><span class="badge badge-danger-inverse font-16">2%<i class="feather icon-arrow-down-right"></i></span></p>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="card m-b-30">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Coming Soon</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <p class="dash-analytic-icon"><i class="dripicons-alarm primary-rgba text-primary"></i></p>
                                                <h3 class="mb-3">{{App\Models\Commingsoon::count()}}</h3>
{{--                                                <p class="mb-0"><span class="badge badge-danger-inverse font-16">2%<i class="feather icon-arrow-down-right"></i></span></p>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="card m-b-30">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Questions</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <p class="dash-analytic-icon"><i class="dripicons-question warning-rgba text-warning"></i></p>
                                                <h3 class="mb-3">{{App\Models\Question::count()}}</h3>
{{--                                                <p class="mb-0"><span class="badge badge-danger-inverse font-16">2%<i class="feather icon-arrow-down-right"></i></span></p>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                <!-- End row -->
            </div>
            <!-- End Contentbar -->

@endsection
