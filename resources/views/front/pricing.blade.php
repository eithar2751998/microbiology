@extends('layouts.home')
@section('styles')

@endsection
@section('content')
    @include('front.includes.darkNavbar')
    <!-- Blog Section Start -->
    <div id="rs-blog" class="rs-blog style2 modify2 pb-100 pt-100 md-pt-70 md-pb-70">
        <div class="container relative">
            <div class="row">
                @foreach($plans as $plan)
                <div class="blog-item col-md-6 col-lg-3">
                    <div class="blog-content new-style2">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user-o"></i> Admin</li>
                            <li><i class="fa fa-calendar"></i>{{Carbon\Carbon::create($plan->created_at)->toFormattedDateString()}}</li>
                        </ul>
                        <h3 class="title text-capitalize"><a href="blog-single.html"> {{$plan->name}} </a></h3>
                        <div class="desc"> {!! $plan->description !!} </div>
                        <ul class="blog-bottom">
{{--                            <li class="cmnt-part"><a href="#">(12) Comments</a></li>--}}
                            <input type="hidden" name="amount" value = {{$plan->price}}>
                            <li class="btn-part"><a class="readon-arrow" href="{{ route('payment',$plan->id) }}">Add To Cart</a></li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Blog Section End -->
@endsection

