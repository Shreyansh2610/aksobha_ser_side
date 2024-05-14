<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});


Route::get('/login-using-id/{id}', function ($id) {
    auth()->loginUsingId($id);

    return redirect('home');
});


Route::group(['middleware' => 'guest'], function () {
    Auth::routes();
});
Route::any('logout', 'Auth\LoginController@logout')->name('logout');
