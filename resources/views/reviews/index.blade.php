@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Question List</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Questions</li>
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
                            <div class="col-8">
                                <h5 class="card-title mb-0 ">All Questions</h5>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('dashboard.question.create')}}" class="btn btn-primary"> Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ __('admin/global.id') }}
                                    </th>
                                    <th>
                                        Username
                                    </th>
                                    <th>
                                        Content
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $key=> $review)
                                    <tr>
                                        <td>

                                        </td>
                                        <td> {{ $key+1 }} </td>
                                        <td> {{ $review->user->name }} </td>
                                        <td>
                                            {{ $review->content }}
                                        </td>
                                        <td>
                                            @if($review->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">In Active</span>

                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('dashboard.review.change_status',$review-> id)}}" class="btn btn-success-rgba"
                                               onclick="return confirm('{{__('global.change_status')}}');">
                                                <i class="feather icon-refresh-ccw"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                            {{ $reviews->links() }}
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
    </script>
    <script>
        setTimeout(function() {
            $('#alert').fadeOut('fast');
        }, 3000);
    </script>
@endsection
