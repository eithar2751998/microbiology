@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Add Course</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Course</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="contentbar">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Add Course</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route("dashboard.dept.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ __('admin/global.name') }}*</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($admin) ? $admin->name : '') }}" required>
                            @if($errors->has('username'))
                                {{ $errors->first('username') }}
                            @endif

                        </div>
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label  for="image">{{ __('admin/global.image') }}*</label>
                            <input type="file" name="image" id="image" class="d-block">
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
