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
                                        {{ __('admin/global.title') }}
                                    </th>
                                    <th>
                                        {{ __('admin/question.answers') }}
                                    </th>
                                    <th>
                                        {{ __('admin/question.subjects') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($questions as $key => $question)
                                        <tr data-entry-id="{{ $question->id }}">
                                            <td>
                                            </td>
                                            <td>
                                                {{$key+1}}
                                            </td>
                                            <td>
                                                {{ $question->title ?? '' }}
                                            </td>
                                            <td>
                                                @foreach($question->answers()->get() as $answer)
                                                    {{ $answer->text }}<br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($question->subjects()->get() as $subject)
                                                    <span class="badge badge-info">{{ $subject->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <form action="{{ route('dashboard.question.delete', $question->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <div class="button-list">
                                                        <a href="{{ route('dashboard.question.edit', $question->id) }}" class="btn btn-warning-rgba"><i class="feather icon-edit-2"></i></a>
                                                        <a href="javascript:void(0)" id="show-question" data-url="{{ route('dashboard.question.show', $question->id)}}" class="btn btn-primary model-animation-btn" data-animation="zoomIn">
                                                            <i class="feather icon-eye"></i>
                                                        </a>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn btn-danger-rgba" ><i class="feather icon-trash"></i></button>
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
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title mb-0">Trashed Questions</h5>
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
                                        {{ __('admin/question.subjects') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trashedQuestions as $key => $trashQuestion)
                                    <tr data-entry-id="{{ $trashQuestion->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $key +1 }}
                                        </td>
                                        <td>
                                            {{ $trashQuestion->title ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($trashQuestion->subjects()->get() as $subject)
                                                <span class="badge badge-info">{{ $subject->name }}</span>
                                            @endforeach
                                        </td>

                                        <td>
                                            <form action="{{ route('dashboard.question.forceDelete', $trashQuestion->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <div class="button-list">
                                                    <a href="{{ route('dashboard.question.restore',  $trashQuestion->id) }}" class="btn btn-secondary-rgba"><i class="icon feather icon-rotate-cw"></i></a>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger-rgba" ><i class="feather icon-trash"></i></button>
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
    <div class="modal fade" id="questionShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>ID:</strong> <span id="id"></span></p>
                    <p><strong>Title:</strong> <span id="title"></span></p>
                    <p><strong>Subjects:</strong> <span id="subjects"></span></p>
                    <p><strong>Answers:</strong> <span id="answers"></span></p>
                    <p><strong>Image:</strong> <span id="image"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close"  data-bs-dismiss="modal">Close</button>
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
            $('body').on('click', ' #show-question', function () {
                var questionURL = $(this).data('url');
                $.get(questionURL, function (data) {
                    console.log(data)
                    $('#questionShowModal').modal('show');
                    $('#id').text(data[0].id);
                    $('#title').text(data[0].title);

                    for(var i=0; i < data[1].length; i++){
                        $('#answers').append('<p id="text">'+data[1][i].text+'</p>');
                    }
                    for(var i=0; i < data[2].length; i++) {
                        $('#subjects').text (data[2][i].name);
                    }
                    $('#image').html(`<div class='text-center'><img style='width:200px; height:200px' src="{{asset('questions/${data[0].title}/${data[0].image}')}}"></div>`);
                })
            });
            function close(){
            }

        });

    </script>
    <script>
        setTimeout(function() {
            $('#alert').fadeOut('fast');
        }, 3000);
    </script>
@endsection
