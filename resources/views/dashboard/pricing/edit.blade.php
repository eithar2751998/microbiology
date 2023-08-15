@extends('layouts.dashboard')
@section('styles')
@endsection
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Add pricing Plan</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">pricing Plan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="contentbar">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Add pricing Plan</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route("dashboard.pricing.update",[$plan->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="price">Price:</label>
                                <input type="number" name="price" class="form-control" value="{{$plan->price}}" step="0.01" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="price">Max Users:</label>
                                <input type="number" name="max_users" class="form-control" value="{{$plan->max_users}}" step="0.01" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="price">Trial Days:</label>
                                <input type="number" name="trial_days" class="form-control" value="{{$plan->trial_days}}" step="0.01" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="billing_cycle">Billing Cycle:</label>
                                <select name="billing_cycle" class="form-control" required>
                                    <option value="monthly" @if($plan->billingcycle == "monthly") selected @endif>Monthly</option>
                                    <option value="annually" @if($plan->billingcycle == "annually") selected @endif>Annually</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" value="{{$plan->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" class="tinymce-editor" name="description" >{!! $plan->description !!}</textarea>
                        </div>


                        <input class="btn btn-primary" type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->

@endsection
@section('scripts')
    <script src="{{asset('assets/dashboard/js/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: '.tinymce-editor',
            plugins: 'autolink link lists',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
            menubar: false,
        });
    </script>

@endsection
