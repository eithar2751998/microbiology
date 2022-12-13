@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Edit Permission</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">User Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Edit Permission</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="contentbar">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Permission</h5>
            </div>

            <div class="card-body">
                <form action="{{ route("dashboard.permissions.update", [$permission->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">{{ __('admin/permission.title') }}*</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif

                    </div>
                    <div>
                        <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
