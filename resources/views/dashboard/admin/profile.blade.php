@extends('layouts.dashboard')
@section('content')

    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Dashboard</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Profile</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="contentbar">
        <!-- Start row -->
        <div class="row justify-content-center">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Profile</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div id="accordionWrap5" role="tablist"
                                         aria-multiselectable="true">
                                        <div class="card collapse-icon accordion-icon-rotate">
                                            <div class="row">
                                                <div class="card-content collapse show">
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless  mb-0">
                                                            <tbody>
                                                            <tr>
                                                                <td>Name:</td>
                                                                <td>{{$admin->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email:</td>
                                                                <td>{{$admin->email}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Role:</td>
                                                                <td>
                                                                    @foreach($admin->roles()->pluck('name') as $role)
                                                                        <span class="badge badge-primary">{{ $role }}</span>
                                                                    @endforeach
                                                                </td>

                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav class="mb-3">
                            <div class="nav nav-tabs">

                            </div>
                        </nav>
                        <div class="tab-content">

                        </div>
{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-lg-4">--}}
{{--                                <div class="onboard-content text-center my-5">--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
@endsection
