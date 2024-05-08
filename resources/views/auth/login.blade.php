<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('md5/css/mdb.min.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('md5/css/mdb.dark.min.css')}}"> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script src="{{ asset('md5/js/mdb.es.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('custom/css/custom_style.css') }}">
    <!-- Styles -->
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #97ce51;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #97ce51, #a2c673);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #97ce51, #a2c673)
        }
    </style>
</head>

<body class="font-sans antialiased bg-white text-dark/50">
    <section class="vh-100 gradient-custom d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-white text-dark" style="border-radius: 5px;">
                        <div class="card-body p-5 text-center">
                            <form action="javascript:;" id="loginForm" method="post">@csrf
                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-dark-50 mb-5">Please enter your email and OTP!</p>

                                    <div class="form-outline form-dark mb-4">
                                        <input type="text" id="email" name="email"
                                            class="form-control border border-success form-control-lg" />
                                        <label class="form-label" for="email">Email</label>
                                    </div>
                                    <div class="form-outline form-dark mb-4">
                                        <button type="button" id="sendOtp" class="btn btn-outline-primary">Send
                                            OTP</button>
                                    </div>

                                    <div class="form-outline form-dark mb-4">
                                        <input type="password" id="otp" name="otp"
                                            class="form-control border-success border form-control-lg" disabled />
                                        <label class="form-label" for="typePasswordX">OTP</label>
                                    </div>

                                    {{-- <p class="small mb-5 pb-lg-2"><a class="text-dark-50" href="#!">Forgot
                                        password?</a></p> --}}

                                    <button data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-outline-success btn-lg px-5" type="submit">Login</button>
                                </div>

                                <div>
                                    <p class="mb-0">Don't have an account? <a href="#!"
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

    <script>
        $(document).ready(function() {
            $(sendOtp).on('click', function(e) {
                let form = $('#loginForm');
                form.find('span.error').remove();
                form.validate({
                    rules: {
                        'email': 'required',
                    },
                    messages: {
                        'email': 'Email is required',
                    },
                    errorElement: 'span',
                    errorLabelContainer: '.errorTxt',
                    errorPlacement: function(error, element) {
                        error.appendTo(element.parent("div"));
                    }
                });

                if (form.valid()) {
                    $.ajax({
                        type: "post",
                        url: "/sendloginotp",
                        data: form.serialize(),
                        dataType: "JSON",
                        success: function(response) {

                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
