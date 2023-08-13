@extends('layouts.app')
@section('content')
		<!-- Main content Start -->
        <div class="main-content">
    		<!-- My Account Section Start -->
    		<div class="rs-login pt-100 pb-100 md-pt-70 md-pb-70">
                <div class="container">
                    <div class="noticed">
                        <div class="main-part">
                            <div class="method-account">
                                <h2 class="login">Login</h2>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <input id="email" type="email" name="email" placeholder="E-mail"  required autofocus>
                                    <input id="email" type="text" name="password" placeholder="Password"  required autocomplete="current-password">
                                    @if (Route::has('password.request'))
                                        <a  href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                    <button type="submit" class="readon submit-btn">login</button>
                                    <div class="last-password">
                                        <p>Not registered? <a href="#">Create an account</a></p>
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
