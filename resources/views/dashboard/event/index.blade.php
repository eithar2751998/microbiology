@extends('layouts.dashboard')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Event List</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.events.index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Events</li>
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
                                <h5 class="card-title mb-0 ">All Events</h5>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('dashboard.events.create')}}" class="btn btn-primary"> Add</a>
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
                                        {{ __('admin/global.title') }}
                                    </th>
                                    <th>
                                        {{ __('admin/global.date') }}
                                    </th>
                                    <th>
                                        {{ __('admin/global.time') }}
                                    </th>
                                    <th>
                                        {{ __('global.status') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $key => $event)
                                    <tr data-entry-id="{{ $event->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $key +1}}
                                        </td>
                                        <td>
                                            {{ $event->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $event->date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $event->time ?? '' }}
                                        </td>

                                        <td>
                                            @if($event->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">In Active</span>

                                            @endif
                                        </td>


                                        <td>
                                            <form action="{{ route('dashboard.events.delete', $event->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <div class="button-list">
                                                    <a href="{{ route('dashboard.events.edit', $event->id) }}" class="btn btn-warning-rgba"><i class="feather icon-edit-2"></i></a>
                                                    <a href="javascript:void(0)" id="show-event" data-url="{{ route('dashboard.events.show', $event->id)}}" class="btn btn-primary model-animation-btn" data-animation="zoomIn">
                                                        <i class="feather icon-eye"></i>
                                                    </a>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger-rgba" ><i class="feather icon-trash"></i></button>
                                                    <a href="{{route('dashboard.events.change_status',$event-> id)}}" class="btn btn-success-rgba"
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
    <div class="modal fade" id="eventShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>ID:</strong> <span id="id"></span></p>
                    <p><strong>Title:</strong> <span id="title"></span></p>
                    <p><strong>Date:</strong> <span id="date"></span></p>
                    <p><strong>Time:</strong> <span id="time"></span></p>
                    <p><strong>Description:</strong> <span id="desc"></span></p>
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
            $('body').on('click', ' #show-event', function () {
                var deptURL = $(this).data('url');
                $.get(deptURL, function (data) {
                    $('#eventShowModal').modal('show');
                    $('#id').text(data.id);
                    $('#title').text(data.title);
                    $('#date').text(data.date);
                    $('#time').text(data.time);
                    $('#desc').html(data.description);
                    $('#image').html(`<div class='text-center'><img style='width:200px; height:200px' src="{{asset('events/${data.title}/${data.image}')}}"></div>`);
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

