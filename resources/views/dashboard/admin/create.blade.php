@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Add Admin</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="contentbar">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Add Admin</h5>
                </div>
                <div class="card-body">

                    <form action="{{ route("dashboard.admins.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('admin/user.name') }}*</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($admin) ? $admin->name : '') }}" >
                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif

                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ __('admin/user.email') }}*</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($admin) ? $admin->email : '') }}" >
                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password">{{ __('admin/user.password') }}</label>
                                <input type="password" id="password" name="password" class="form-control" >
                                @if($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6 {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password">{{ __('admin/user.confirm_password') }}</label>
                                <input type="password" id="password" name="password_confirmation" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                            <label for="roles" class="w-100 m-0">{{ __('admin/user.roles') }}*
                            <select name="roles[]" id="roles" class="select2 form-control" >
                                @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <span class="text-danger">{{ $errors->first('roles') }}</span>

                            @endif
                        </div>
                        <div>
                            <input class="btn btn-default" type="submit" value="{{ trans('global.save') }}">
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
