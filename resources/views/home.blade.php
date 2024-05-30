@extends('layouts.app')
@section('panels-head')
    <style>
        .nav-pills .nav-link.active,
        .nav-pills .nav-link.active:hover,
        .nav-pills .nav-link.active:focus {
            background-color: #509e7a;
            color: #fff;
        }

    </style>

@endsection
@section('content')
    @extends('home_layouts.navbar')
    <div class="container-fuild" style="margin-top:-90px">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="vh-100" style="z-index: 1;">
                <br><br>
                <div id="content-section" class="mt-2">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
