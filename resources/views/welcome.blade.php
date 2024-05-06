<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('md5/css/mdb.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('md5/css/mdb.dark.min.css')}}"> --}}
    <script src="{{asset('md5/js/mdb.es.min.js')}}"></script>
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

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-dark-50 mb-5">Please enter your login and password!</p>

                                <div class="form-outline form-dark mb-4">
                                    <input type="email" id="typeEmailX" class="form-control border border-success form-control-lg" />
                                    <label class="form-label" for="typeEmailX">Email</label>
                                </div>

                                <div class="form-outline form-dark mb-4">
                                    <input type="password" id="typePasswordX" class="form-control border-success border form-control-lg" />
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>

                                <p class="small mb-5 pb-lg-2"><a class="text-dark-50" href="#!">Forgot
                                        password?</a></p>

                                <button data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-outline-success btn-lg px-5" type="submit">Login</button>

                                {{-- <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-dark"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-dark"><i
                                            class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-dark"><i class="fab fa-google fa-lg"></i></a>
                                </div> --}}

                            </div>

                            <div>
                                <p class="mb-0">Don't have an account? <a href="#!"
                                        class="text-dark-50 fw-bold">Sign Up</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
