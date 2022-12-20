@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Admin List</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.admins.index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admins</li>
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
                                <h5 class="card-title mb-0">All admins</h5>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('dashboard.admins.create')}}" class="btn btn-primary " > Add</a>
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
                                        {{ __('admin/user.id') }}
                                    </th>
                                    <th>
                                        {{ __('admin/user.name') }}
                                    </th>
                                    <th>
                                        {{ __('admin/user.email') }}
                                    </th>
                                    <th>
                                        {{ __('admin/user.roles') }}
                                    </th>
                                    <th>
                                        {{ __('global.status') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admins as $key => $admin)
                                    @if( $admin->id == auth()->user()->id)
                                        @continue
                                    @endif
                                    <tr data-entry-id="{{ $admin->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $admin->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admin->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $admin->email ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($admin->roles()->pluck('name') as $role)
                                                <span class="badge badge-primary">{{ $role }}</span>
                                            @endforeach
                                        </td>
                                         <td>
                                            @if($admin->status == 1)
                                                 <span class="badge badge-success">Active</span>
                                             @else
                                                 <span class="badge badge-danger">In Active</span>

                                             @endif
                                        </td>

                                        <td>
                                            <form action="{{ route('dashboard.admins.delete', $admin->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <div class="button-list">
                                                    <a href="{{ route('dashboard.admins.edit', $admin->id) }}" class="btn btn-warning-rgba"><i class="feather icon-edit-2"></i></a>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger-rgba" ><i class="feather icon-trash"></i></button>
                                                    <a href="{{route('dashboard.admins.change_status',$admin-> id)}}" class="btn btn-success-rgba"
                                                       onclick="return confirm('{{__('global.change_status')}}');">
                                                            <i class="feather icon-refresh-ccw"></i>
                                                    </a>
                                                </div>

                                            </form>

                                        </td>

                                    </tr>
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
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title mb-0">Trashed admins</h5>
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
                                        {{ __('admin/user.id') }}
                                    </th>
                                    <th>
                                        {{ __('admin/user.name') }}
                                    </th>
                                    <th>
                                        {{ __('admin/user.email') }}
                                    </th>
                                    <th>
                                        {{ __('admin/user.roles') }}
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trashAdmins as $key => $trashAdmin)
                                    <tr data-entry-id="{{ $trashAdmin->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $trashAdmin->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $trashAdmin->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $trashAdmin->email ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($trashAdmin->roles()->pluck('name') as $role)
                                                <span class="badge badge-primary">{{ $role }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <form action="{{ route('dashboard.admins.forceDelete',$trashAdmin->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <div class="button-list">
                                                    <a href="{{ route('dashboard.admins.restore', $trashAdmin->id) }}" class="btn btn-secondary-rgba"><i class="icon feather icon-rotate-cw"></i></a>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger-rgba" ><i class="feather icon-trash"></i></button>
                                                </div>

                                            </form>

                                        </td>

                                    </tr>
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
