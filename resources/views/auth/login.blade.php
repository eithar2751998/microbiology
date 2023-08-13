@extends('layouts.home')
@section('content')
    <!-- Main content Start -->
    <div class="main-content">
        <!-- My Account Section Start -->

        <div class="rs-login pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="noticed">
                    <div class="main-part">
                        <div class="method-account">

                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h2 class="login">Login</h2>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <input id="email" type="email" name="email" placeholder="E-mail"  required autofocus autocomplete="username">
                                <input id="password" type="password" name="password" placeholder="Password"  required autocomplete="current-password">
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" id="alert">{{$error}}</div>
                                @endforeach
                                <button type="submit" class="readon submit-btn mt-3">login</button>
                                <hr>
                                <a href="{{ url('authorized/facebook') }}" class="readon facebook-btn mt-3">
                                    <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                                </a>
                                <a href="{{ url('authorized/google') }}" class="readon google-btn mt-3">
                                    <i class="fa fa-google fa-fw"></i> Login with Google
                                </a>
                                <hr>
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                <div class="last-password">
                                    <a href="{{route('register')}}">Create an account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account Section End -->

    </div>
    <!-- Main content End -->
@endsection
