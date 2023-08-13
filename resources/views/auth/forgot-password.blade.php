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
                            <h2 class="login" style="font-size: 37px;">Forgot your password?</h2>
                            <div class="mb-4 text-sm text-gray-600">
                                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </div>

                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <input id="email" type="email" name="email" placeholder="E-mail"  required autofocus>
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" id="alert">{{$error}}</div>
                                @endforeach
                                <button type="submit" class="readon submit-btn mt-3">Email Password Reset Link</button>
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
