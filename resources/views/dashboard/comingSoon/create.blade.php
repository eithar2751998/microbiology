@extends('layouts.dashboard')
@section('styles')
    <!-- Switchery css -->
    <link href="{{asset('assets/dashboard/plugins/switchery/switchery.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/dashboard/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
    <!-- Code Mirror css -->
    <link href="{{asset('assets/dashboard/plugins/code-mirror/codemirror.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Add ComingSoon</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">ComingSoon</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="contentbar">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Add ComingSoon</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route("dashboard.coming.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ __('admin/global.title') }}*</label>
                            <input type="text" id="title" name="title" class="form-control" value="" required>
                            @if($errors->has('title'))
                                {{ $errors->first('title') }}
                            @endif

                        </div>

                        <div class="form-group mt-3">
                            <label for="summernote">{{ __('admin/global.desc') }} *</label>
                            <textarea id="summernote" name="desc" ></textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label  for="img">{{ __('admin/global.image') }}*</label>
                                <input type="file" name="image" id="img" class="d-block">
                            </div>
                            <div class="col-lg-6 col-xl-4 mt-4" style="width: auto;height: 150px">
                                <img style="width: 150px; height: 150px" src="" alt=" Coming Image" class="rounded " id="image">
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
    <script src="{{asset('assets/dashboard/plugins/switchery/switchery.min.js')}}"></script>
    <!-- Wysiwig js -->
    <script src="{{asset('assets/dashboard/plugins/tinymce/tinymce.min.js')}}"></script>
    <!-- Summernote JS -->
    <script src="{{asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- Code Mirror JS -->
    <script src="{{asset('assets/dashboard/plugins/code-mirror/codemirror.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/code-mirror/htmlmixed.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/code-mirror/css.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/code-mirror/javascript.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/code-mirror/xml.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/custom/custom-form-editor.js')}}"></script>


    <script>
        img.onchange = evt => {
            const [file] = img.files
            if (file) {
                image.src = URL.createObjectURL(file)
            }
        }
    </script>

@endsection
