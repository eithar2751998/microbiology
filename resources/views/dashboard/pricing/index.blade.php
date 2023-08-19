@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">pricing List</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">pricing </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                @if(session('success'))
                    <div class="alert alert-success" id="alert">{{session('success')}}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger" id="alert">{{session('error')}}</div>
                @endif
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="card-title mb-0 ">All pricing</h5>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('dashboard.pricing.create')}}" class="btn btn-primary"> Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ __('admin/global.name') }}
                                    </th>
                                    <th>
                                        {{ __('admin/global.desc') }}
                                    </th>
                                    <th>
                                        {{ __('admin/global.price') }}
                                    </th>
                                    <th>
                                        {{ __('admin/global.billing_cycle') }}
                                    </th>
                                    <th>
                                        {{ __('admin/global.trial_days') }}
                                    </th>
                                    <th>
                                        {{__('global.status')}}
                                    </th>
                                    <th>
                                        {{ __('admin/global.actions') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pricingPlans as $plan)
                                    <td></td>
                                    <td>{{$plan->name}}</td>
                                    <td>{!! $plan->description !!}</td>
                                    <td>{{$plan->price}}</td>
                                    <td>{{$plan->billing_cycle}}</td>
                                    <td>{{$plan->trial_days}}</td>
                                    <td>
                                        @if($plan->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">In Active</span>

                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('dashboard.pricing.delete', $plan->id ) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <div class="button-list">
                                                <a href="{{ route('dashboard.pricing.edit', $plan->id ) }}" class="btn btn-warning-rgba"><i class="feather icon-edit-2"></i></a>
                                                <a href="{{ route('dashboard.pricing.change_status', $plan->id )}}" class="btn btn-success-rgba"
                                                   onclick="return confirm('{{__('global.change_status')}}');">
                                                    <i class="feather icon-refresh-ccw"></i>
                                                </a>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-danger-rgba" ><i class="feather icon-trash"></i></button>
                                            </div>

                                        </form>
                                    </td>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>

@endsection
@section('scripts')
    <script>
        setTimeout(function() {
            $('#alert').fadeOut('fast');
        }, 3000);
    </script>
@endsection
