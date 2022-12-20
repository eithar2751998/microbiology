@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Add Role</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">User Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Role</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="contentbar">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Add Role</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.roles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} col-md-8">
                            <label for="name">{{ __('admin/role.title') }}</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($role) ? $role->name : '') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }} col-md-8">
                            <label for="permission">Role Permessions</label>
                            <select name="permission[]" id="permission" class="select2-multi-select form-control" multiple="multiple"  >
                                @foreach($permissions as $id => $permission)
                                    <option value="{{ $id }}" >{{ $permission }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('permission'))
                                <span class="text-danger">{{ $errors->first('permission') }}</span>
                            @endif

                        </div>
                        <div>
                            <input class="btn btn-default" type="submit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->

@endsection
@section('scripts')


@endsection
