@extends('layouts.dashboard')
@section('styles')
    <link href="{{asset('assets/dashboard/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/dashboard/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/dashboard/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Add Question</h4>
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
                    <h5 class="card-title">Add Question</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route("dashboard.question.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="summernote">{{ __('admin/global.title') }} *</label>
                            <textarea id="summernote" name="title" >{{{old('title')}}}</textarea>
                            @if($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="subjects">{{ __('admin/question.subjects') }}*</label>
                            <select  id="subjects" class="select2-multi-select form-control" name="subjects[]" multiple="multiple">
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('subjects'))
                                <span class="text-danger">{{ $errors->first('subjects') }}</span>
                            @endif

                        </div>
                        <div class="form-group mt-3">
                            <label for="answer">{{ __('admin/question.answers') }} *</label>
                            <table class="table " id="dynamicAddRemove">
                                <tr>
                                    <td>
                                        <input type="text" id="answer" name="text[]" placeholder="Enter Answer" class="form-control" />
                                    </td>
                                    <td>
                                        <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add</button>
                                    </td>
                                    <td class="custom-control custom-radio">
                                        <input type="radio" id="correct[0]" name="correct" value="0" class="custom-control-input">
                                        <label class="custom-control-label" for="correct[0]" > Correct</label>
                                    </td>
                                </tr>
                            </table>
                            @if($errors->has('text'))
                                <span class="text-danger">{{ $errors->first('text') }}</span>
                            @endif
                            @if($errors->has('correct'))
                                <span class="text-danger">{{ $errors->first('correct') }}</span>
                            @endif
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" id="answer" name="text[]" placeholder="Enter Answer" class="form-control" />' +
                '</td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td>' +
                '<td class="custom-control custom-radio"> ' +
                '<input type="radio" id="correct['+i+']" name="correct" value="'+i+'" class="custom-control-input"> ' +
                '<label class="custom-control-label" for="correct['+i+']" >Correct</label> </td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });


        // $('#summernote').summernote({
        //     toolbar: [
        //         // [groupName, [list of button]]
        //         ['style', ['bold', 'italic', 'underline', 'clear']],
        //         ['font', ['strikethrough', 'superscript', 'subscript']],
        //         ['fontsize', ['fontsize']],
        //         ['color', ['color']],
        //         ['para', ['ul', 'ol', 'paragraph']],
        //         ['height', ['height']],
        //         ['insert', ['picture']],
        //     ],
        //     height: 60,
        //     width: 500
        // });
        $('#summernote').summernote('code', 'html_tags_string_from_db');


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
