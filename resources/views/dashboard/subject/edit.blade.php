@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Edit Topic</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Topic</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="contentbar">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Edit Topic</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route("dashboard.subjects.update",[$subject->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="name">{{ __('admin/global.name') }}*</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{$subject->name}}" >
                                @if($errors->has('name'))
                                   <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                            <div class="form-group col-lg-6">
                                <label for="department">{{ __('admin/global.department') }}*</label>
                                <select name="department_id" id="department" class="select2 form-control" >
                                    @foreach($departments as  $department)
                                        <option value="{{ $department->id }}" {{$subject->department_id == $department->id ? 'selected' : ''}} >{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('department'))
                                    <span class="text-danger"> {{ $errors->first('department') }}</span>
                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label  for="img">{{ __('admin/global.image') }}*</label>
                                <input type="file" name="image" id="img" class="d-block">
                            </div>
                            <div class="col-lg-6 col-xl-4 mt-4" style="width: auto;height: 150px">
                                <img style="width: 150px; height: 150px" src="{{asset('subjects/'.$subject->name.'/'.$subject->image)}}" alt=" Subject Image" class="rounded " id="image">
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
