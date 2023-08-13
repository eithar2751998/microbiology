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
                            <h2 class="login">Register</h2>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <input  type="text" name="name"  placeholder="Name"  required autofocus autocomplete="name">
                                <input  type="email" name="email" placeholder="E-mail"  required >
                                <input  type="password" name="password" placeholder="Password"  required autocomplete="new-password">
                                <input  type="password" name="password_confirmation" placeholder="Confirm Password"  required >

                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="mt-4">
                                        <x-label for="terms">
                                            <div class="flex items-center">
                                                <x-checkbox name="terms" id="terms" required />

                                                <div class="ml-2">
                                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </x-label>
                                    </div>
                                @endif
                                <button type="submit" class="readon submit-btn mt-3">Register</button>
                                <div class="last-password">
                                    <a href="{{route('login')}}">Already registered?</a>
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

