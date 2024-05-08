<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('/sendloginotp',[RegisterController::class,'sendloginotp'])->name('sendloginotp');

Route::get('/home', [HomeController::class, 'index'])->name('home');
