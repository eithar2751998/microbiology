<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themesbox.in/admin-templates/theta/html/dark-vertical/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Nov 2020 14:39:30 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Theta is a bootstrap & laravel admin dashboard template">
    <meta name="keywords" content="admin, admin dashboard, admin panel, admin template, analytics, bootstrap 4, crm, laravel admin, responsive, sass support, ui kits">
    <meta name="author" content="Themesbox17">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Theta - Bootstrap + Laravel Admin Dashboard Template</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{asset('assets/dashboard/images/favicon.ico')}}">
    <!-- Start css -->
    <link href="{{asset('assets/dashboard/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/dashboard/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/dashboard/css/style.css')}}" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout">
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            <div class="auth-box login-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-6 col-lg-5">
                        <div class="auth-box-left">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Your comminuty awaits.</h4>
                                    <div class="auth-box-icon">
                                        <img src="{{asset('assets/dashboard/images/authentication/auth-box-icon.svg')}}" class="img-fluid" alt="auth-box-icon">
                                    </div>
                                    <div class="auth-box-logo">
                                        <img src="{{asset('assets/front/images/logo.png')}}" class="img-fluid " alt="logo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start end -->
                    <!-- Start col -->
                    <div class="col-md-6 col-lg-5">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('dashboard.login')}}" method="post">
                                        @csrf
                                        <h4 class="text-primary mb-4">Log in !</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter emila here.." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password here" required>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-sm-6">
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="rememberme">
                                                  <label class="custom-control-label font-14" for="rememberme">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                              <div class="forgot-psw">
{{--                                                <a id="forgot-psw" href="{{{url('forgetPassword')}}}" class="font-14">Forgot Password?</a>--}}
                                              </div>
                                            </div>
                                        </div>
                                      <button type="submit" class="btn btn-success btn-lg btn-block font-18">Log in Now</button>
                                    </form>
{{--                                    <div class="login-or">--}}
{{--                                        <h6 class="text-muted">OR</h6>--}}
{{--                                    </div>--}}
{{--                                    <div class="social-login text-center">--}}
{{--                                        <button type="submit" class="btn btn-primary-rgba btn-lg btn-block font-18"><i class="mdi mdi-facebook mr-2"></i>Log in with Facebook</button>--}}
{{--                                        <button type="submit" class="btn btn-danger-rgba btn-lg btn-block font-18"><i class="mdi mdi-google mr-2"></i>Log in with Google</button>--}}
{{--                                    </div>--}}
{{--                                    <p class="mb-0 mt-3">Don't have a account? <a href="{{url('login')}}">Sign up</a></p>--}}
                                </div>
                            </div>
                        </div>
                        <!-- End Auth Box -->
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->
    <!-- Start js -->
    <script src="{{asset('assets/dashboard/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/modernizr.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/detect.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/jquery.slimscroll.js')}}"></script>
    <!-- End js -->
</body>

<!-- Mirrored from themesbox.in/admin-templates/theta/html/dark-vertical/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Nov 2020 14:39:30 GMT -->
</html>
