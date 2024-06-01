@extends('layouts.app')
@section('panels-head')
    <style>
        .nav-pills .nav-link.active,
        .nav-pills .nav-link.active:hover,
        .nav-pills .nav-link.active:focus {
            background-color: #509e7a;
            color: #fff;
        }
        .card-img-top {
          height: 200px;
          object-fit: cover;
        }
        .workshop-details {
          display: flex;
          justify-content: space-around;
          text-align: center;
        }
        .workshop-details div {
          flex: 1;
        }
    </style>
@endsection
@section('content')

    <div class="container-fuild" style="margin-top:-90px">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="vh-100" style="z-index: 1;">
                <br><br>
                <div id="content-section" class="mt-2" style="height: 90%">

                </div>
            </div>
        </div>
    </div>
    <div>
        @extends('home_layouts.navbar')
    </div>

</div>
@endsection

@section('panels-script')
    <script>
        $_homePage.layoutPage();
    </script>
@endsection
