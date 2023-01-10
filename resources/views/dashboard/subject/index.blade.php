@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Topic List</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.subjects.index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Topics</li>
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
                                <h5 class="card-title mb-0 ">All Topics</h5>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('dashboard.subjects.create')}}" class="btn btn-primary"> Add</a>
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
                                        {{ __('admin/global.name') }}
                                    </th>
                                    <th>
                                        {{ __('admin/global.department') }}
                                    </th>
                                    <th>
                                        {{ __('global.status') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subjects as $key => $subject)
                                    <tr data-entry-id="{{ $subject->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $subject->id ?? '' }}
                                        </td>
                                        <td>

                                            <a href="{{ route('dashboard.subjects.questions', $subject->id) }}" class="text-secondary" >{{ $subject->name ?? '' }}</a>
                                        </td>
                                        <td>
                                                <span class="badge badge-primary ">{{$subject->department->name}}</span>
                                        </td>
                                        <td>
                                            @if($subject->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">In Active</span>

                                            @endif
                                        </td>


                                        <td>
                                            <form action="{{ route('dashboard.subjects.delete', $subject->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <div class="button-list">
                                                    <a href="{{ route('dashboard.subjects.edit', $subject->id) }}" class="btn btn-warning-rgba"><i class="feather icon-edit-2"></i></a>
                                                    <a href="javascript:void(0)" id="show-dept" data-url="{{ route('dashboard.subjects.show', $subject->id)}}" class="btn btn-primary model-animation-btn" data-animation="zoomIn">
                                                        <i class="feather icon-eye"></i>
                                                    </a>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger-rgba" ><i class="feather icon-trash"></i></button>
                                                    <a href="{{route('dashboard.subjects.change_status',$subject-> id)}}" class="btn btn-success-rgba"
                                                       onclick="return confirm('{{__('global.change_status')}}');">
                                                        <i class="feather icon-refresh-ccw"></i>
                                                    </a>
                                                </div>

                                            </form>

                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show Topic</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>ID:</strong> <span id="id"></span></p>
                    <p><strong>Name:</strong> <span id="name"></span></p>
                    <p><strong>Department:</strong> <span id="dept"></span></p>
                    <p><strong>Image:</strong> <span id="image"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Model js -->
    <script src="{{asset('assets/dashboard/js/custom/custom-model.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            /* When click show user */
            $('body').on('click', ' #show-dept', function () {
                var deptURL = $(this).data('url');
                $.get(deptURL, function (data) {
                    console.log(data);
                    $('#userShowModal').modal('show');
                    $('#id').text(data[0].id);
                    $('#name').text(data[0].name);
                    $('#dept').text(data[1].name);
                    $('#image').html(`<div class='text-center'><img style='width:200px; height:200px' src="{{asset('subjects/${data[0].name}/${data[0].image}')}}"></div>`);
                })
            });

        });
    </script>
    <script>
        setTimeout(function() {
            $('#alert').fadeOut('fast');
        }, 3000);
    </script>
@endsection
