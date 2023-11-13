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
                <h4 class="page-title">Add Terms & Conditions</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Terms & Conditions</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="contentbar">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Add Terms & Conditions</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.term.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('header') ? 'has-error' : '' }}">
                            <div class="form-group mt-3">
                                <label for="summernote">{{ __('admin/about.content') }} *</label>
                                <textarea id="summernote" name="about" ></textarea>
                                @if($errors->has('about'))
                                    <span class="text-danger">{{ $errors->first('about') }}</span>

                                @endif
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

@endsection
