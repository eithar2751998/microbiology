@extends('layouts.dashboard')
@section('styles')
    <link href="{{asset('assets/dashboard/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/dashboard/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/dashboard/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css')}}" rel="stylesheet" type="text/css">

@endsection
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Edit Question</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Question</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="contentbar">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Edit Question</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route("dashboard.question.update",[$question->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">{{ __('admin/global.title') }}*</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{$question->title}}" required>
                            @if($errors->has('title'))
                                {{ $errors->first('title') }}
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="subjects">{{ __('admin/question.subjects') }}*</label>
                            <select  id="subjects" class="select2-multi-select form-control" name="subjects[]" multiple="multiple">
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('title'))
                                {{ $errors->first('title') }}
                            @endif

                        </div>
                        <div class="form-group mt-3">
                            <label for="answer">{{ __('admin/question.answers') }} *</label>
                            <table class="table " id="dynamicAddRemove">
                                @foreach($question->answers()->get() as $key=>$answer)
                                    <tr>
                                        <td>
                                            <input type="text" id="answer" name="text[]" placeholder="Enter Answer" class="form-control" value="{{$answer->text}}"/>
                                        </td>
                                        <td>
                                            @if( $key == 0)
                                                <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add</button>
                                            @else
                                                <button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>
                                            @endif

                                        </td>
                                        <td class="custom-control custom-radio">
                                            @if($answer->correct == 1)
                                                <input type="radio" id="correct[{{$key}}]" name="correct" value="{{$key}}" class="custom-control-input" checked>
                                            @else
                                                <input type="radio" id="correct[{{$key}}]" name="correct" value="{{$key}}" class="custom-control-input">
                                            @endif
                                            <label class="custom-control-label" for="correct[{{$key}}]" > Correct</label>
                                            <input type="hidden" id="countOfAnswers" value="{{$question->answers()->count()}}">
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label  for="img">{{ __('admin/global.image') }}*</label>
                                <input type="file" name="image" id="img" class="d-block">
                            </div>
                            <div class="col-lg-6 col-xl-4 mt-4" style="width: auto;height: 150px">
                                <img style="width: 150px; height: 150px" src="" alt=" event Image" class="rounded " id="image">
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


    <script src="{{asset('assets/dashboard/plugins/select2/select2.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        var i = document.getElementById("countOfAnswers").value;
        $("#dynamic-ar").click(function () {
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="text[]" ' +
                'placeholder="Enter Answer" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td>' +
                '<td class="custom-control custom-radio"> ' +
                '<input type="radio" id="correct['+i+']" name="correct" value="'+i+'" class="custom-control-input"> ' +
                '<label class="custom-control-label" for="correct['+i+']" >Correct</label> </td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>


    <script>
        img.onchange = evt => {
            const [file] = img.files
            if (file) {
                image.src = URL.createObjectURL(file)
            }
        }
    </script>

@endsection
