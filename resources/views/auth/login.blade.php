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
                                    <img src="https://aksobha.com/cdn/shop/files/aksobha-logo_420x.png" alt="{{env('APP_NAME')}}" class="w-100" srcset="">
                                </span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2 mt-3">Welcome to {{env('APP_NAME')}}! 👋</h4>
                        <p class="mb-4">Please sign-in to your account and start the adventure</p>

                        <form id="formAuthentication" class="mb-3"
                            action="{{ route('login') }}"
                            method="POST">@csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" autofocus>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <a href="/password/reset">
                                        <small>Forgot Password?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="Enter password"
                                        aria-describedby="password" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-success d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="/register">
                                <span>Create an account</span>
                            </a>
                        </p>
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
        var error = {{session('error')}}
        $(document).ready(function() {

            console.log(error);
            if(error!=null)
            {
                toastr.error('',error);

            }
        });
    </script>
@endsection
