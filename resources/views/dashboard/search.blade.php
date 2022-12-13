@extends('layouts.dashboard')
@section('content')
    <div class="search-results-container container">
        <h4>Search Results</h4>
        <p class="search-results-count">{{ $questions->total() }} result(s) for '{{ request()->input('query') }}'</p>

    @if ($questions->total() > 0)
        <!-- Start Contentbar -->
            <div class="contentbar">
                <!-- Start row -->
                <div class="row">
                    <!-- Start col -->
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title mb-0"> Questions </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $questions as $question )
                                                    <tr>
                                                        <th scope="row">{{ $question->id }}</th>
                                                        <td>{{ $question->title }}</td>
                                                        <td>
                                                            <form action="{{ route('dashboard.question.delete', $question->id)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="button-list">
                                                                    <a href="{{ route('dashboard.question.edit',$question->id)}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                                                    {{--                                                        <!-- <a href="{{ route('categories.destroy', $c->id)}}" class="btn btn-danger-rgba" type="submit" ><i class="feather icon-trash"> </i> </a> -->--}}
                                                                    <button class="btn btn-danger-rgba" type="submit"><i class="feather icon-trash"></i></button>
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
            <!-- End Contentbar -->

            {{ $questions->appends(request()->input())->links() }}
        @endif
    </div> <!-- end search-results-container -->
@endsection
