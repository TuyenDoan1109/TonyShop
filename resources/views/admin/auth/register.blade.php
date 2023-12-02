<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('backend/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('backend/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('backend/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="{{asset('backend/images/icon/logo-blue.png')}}" alt="CoolAdmin">
                        </a>
                    </div>
                    <div class="login-form">
                        <form action="{{route('admin.auth.register')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" type="text" name="email" placeholder="Email...">
                                @error('email')
                                <span class="invalid-feedback mb-4" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" value="{{ old('email') }}" type="password"
                                       name="password" placeholder="Password...">
                            </div>
                            @error('password')
                            <span class="invalid-feedback mb-4" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="login-checkbox">
                                <label>
                                    <input type="checkbox" name="remember">Remember Me
                                </label>
                                <label>
                                    <a href="#">Forgotten Password?</a>
                                </label>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign up</button>
                            <div class="social-login-content">
                                <div class="social-button">
                                    <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with google</button>
                                    <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                    <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                </div>
                            </div>
                        </form>
                        <div class="register-link">
                            <p>
                                Already have an account?
                                <a href="{{ route('admin.auth.login') }}">Sign in Here</a>
                            </p>
                        </div>
                    </div>

                    @php
                    dump(session()->all());
                    @endphp
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Jquery JS-->
<script src="{{asset('backend/vendor/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap JS-->
<script src="{{asset('backend/vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="v{{asset('backend/endor/bootstrap-4.1/bootstrap.min.js')}}"></script>

<!-- Main JS-->
<script src="{{asset('backend/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->
