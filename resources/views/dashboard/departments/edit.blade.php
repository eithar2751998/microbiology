@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Edit Course</h4>
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
                    <h5 class="card-title">Edit Course</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route("dashboard.dept.update", [$department->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ __('admin/global.name') }}*</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$department->name}}" required>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6  {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label  for="img">{{ __('admin/global.image') }}*</label>
                                <input type="file" name="image" id="img" class="d-block">
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-xl-4">
                                <img style="width: 200px; height: 200px" src="{{asset('departments/'.$department->name.'/'.$department->image)}}" alt="Rounded Image" class="rounded" id="image">
                            </div>

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
<script>
    img.onchange = evt => {
        const [file] = img.files
        if (file) {
            image.src = URL.createObjectURL(file)
        }
    }
</script>

@endsection
