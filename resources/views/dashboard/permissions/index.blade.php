@extends('layouts.dashboard')
@section('style')
@endsection
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Permission List</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">User Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Permission List</li>
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
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="card-title mb-0">All Permissions</h5>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('dashboard.permissions.create')}}" class="btn btn-primary " > Add</a>
                            </div>
{{--                            <div class="col-6">--}}
{{--                                <ul class="list-inline-group text-right mb-0 pl-0">--}}
{{--                                    <li class="list-inline-item">--}}
{{--                                        <div class="form-group mb-0 amount-spent-select">--}}
{{--                                            <select class="form-control" id="formControlSelect">--}}
{{--                                                <option>All</option>--}}
{{--                                                <option>Last Week</option>--}}
{{--                                                <option>Last Month</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-borderless table-striped table-hover datatable datatable-Permission">
                                <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ __('admin/permission.id') }}
                                    </th>
                                    <th>
                                        {{ __('admin/permission.title') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $key => $permission)
                                    <tr data-entry-id="{{ $permission->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $permission->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $permission->name ?? '' }}
                                        </td>
                                        <td>
                                            <form action="{{ route('dashboard.permissions.delete', $permission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <div class="button-list">
                                                    <a href="{{ route('dashboard.permissions.edit', $permission->id) }}" class="btn btn-warning-rgba"><i class="feather icon-edit-2"></i></a>
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
@endsection
