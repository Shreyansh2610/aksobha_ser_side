@extends('layouts.app')
{{-- Title --}}
@section('title', 'Login page')
{{-- Title --}}
@section('panels-head')
    <link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css">

    <style>
        body {
            background: url("/assets/img/pages/auth-background.png");
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        @media(max-width:950px) {
            body {
                background: url("/assets/img/pages/auth-background-1.png");
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }

        }
    </style>
@endsection
@section('content')

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">

                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="justify-content-center">
                            <a href="/login" class="gap-2">
                                <span class="">
                                    <img src="https://aksobha.com/cdn/shop/files/aksobha-logo_420x.png"
                                        alt="{{ env('APP_NAME') }}" class="w-100" srcset="">
                                </span>
                                {{-- <span class="app-brand-text demo h3 mb-0 fw-bold">Frest</span> --}}
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Forgot Password? 🔒</h4>
                        <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
                        <form id="formAuthentication" class="mb-3"
                            action="https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template/auth-reset-password-basic.html"
                            method="GET">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" autofocus>
                            </div>
                            <button class="btn btn-primary d-grid w-100">Send Reset Link</button>
                        </form>
                        <div class="text-center">
                            <a href="auth-login-basic.html" class="d-flex align-items-center justify-content-center">
                                <i class="bx bx-chevron-left scaleX-n1-rtl"></i>
                                Back to login
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
@endsection
@section('panels-script')
    <script src="/assets/js/pages-auth.js"></script>

    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
