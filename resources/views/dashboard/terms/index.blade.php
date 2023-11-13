@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Terms & Conditions</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Terms & Conditions</li>
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
                @if(session('success'))
                    <div class="alert alert-success" id="alert">{{session('success')}}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger" id="alert">{{session('error')}}</div>
                @endif
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title mb-0">Terms & Conditions</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="card mb-30">
                                <div class="card-body">
                                    {!! $term->content !!}
                                    <a href="{{route('dashboard.term.edit', $term->id)}}" class="btn btn-primary mt-4">Edit</a>
                                </div>
                            </div>
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
    </script>
@endsection
