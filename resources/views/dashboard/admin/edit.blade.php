@extends('layouts.dashboard')
@section('content')

    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Edit Admin</h4>
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
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Admin</h5>
            </div>

            <div class="card-body">
                <form action="{{ route("dashboard.admins.update", [$admin->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Username</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($admin) ? $admin->name : '') }}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($admin) ? $admin->email : '') }}">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                        <label for="roles" class="w-100">{{ __('admin/user.roles') }}*
                            <select name="roles[]" id="roles" class="select2 form-control" >
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}"{{$id == $adminRole[0]->name ? 'selected': ''}} >{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('roles')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                    </div>
                    <div>
                        <input class="btn btn-danger" type="button" onclick="history.back();" value="{{ trans('global.cancel') }}">
                        <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
