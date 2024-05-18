@extends('layouts.app')
{{-- Title --}}
@section('title', 'Login page')
{{-- Title --}}
@section('panels-head')
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #9ac069;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #9ac069, #9ac069);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #9ac069, #9ac069)
        }
        @media(max-width:576px) {
            .custom-img-height {
                height: 350px;
            }
        }
            .custom-img-height {
                height: 375px;
            }

    </style>
@endsection
@section('content')


    <section class="vh-100 bg-success d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-7 col-xl-5">
                    <div class="card vh-100 bg-white text-dark" style="border-radius: 5px;">
                        <img src="{{asset('images/demo1.jpeg')}}" class="custom-img-height">
                        <div class="card-body py-3 px-5 text-center">

                            <form action="{{ route('login') }}" id="loginForm" method="post">@csrf
                                <div class="">

                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-dark-50 mb-2">Please enter your email and Password!</p>

                                    <div class="form-outline form-dark mb-3">
                                        <input type="text" id="email" name="email"
                                            class="form-control border border-success form-control-lg"  placeholder="Email"/>
                                        {{-- <label class="form-label" for="email">Email</label> --}}
                                    </div>
                                    {{-- <div class="form-outline form-dark mb-4">
                                        <button type="button" id="sendOtp" class="btn btn-outline-primary">Send
                                            OTP</button>
                                    </div> --}}

                                    <div class="form-outline form-dark mb-3">
                                        <input type="password" id="password" name="password"
                                            class="form-control border-success border form-control-lg" placeholder="Password"/>
                                        {{-- <label class="form-label" for="password">Password</label> --}}
                                    </div>

                                    <p class="small mb-3 pb-lg-2"><a class="text-dark-50" href="/password/reset">Forgot
                                            password?</a></p>

                                    <button data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-outline-success btn-lg px-5 mb-2" type="submit">Login</button>
                                </div>

                                <div>
                                    <p class="mb-2">Don't have an account? <a href="{{route('register')}}"
                                            class="text-dark-50 fw-bold">Sign Up</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('panels-script')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
