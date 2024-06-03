<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkshopController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return redirect('login');
// });


Route::get('/login-using-id/{id}', function ($id) {
    auth()->loginUsingId($id);

    return redirect('home');
});

// Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::group(['middleware' => 'guest'], function () {
    Auth::routes();
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/previous-workshops',[HomeController::class,'previousWorkshop'])->name('previousWorkshop');
    Route::get('/current-workshops',[HomeController::class,'currentWorkshop'])->name('currentWorkshop');
    Route::get('/profile',[HomeController::class,'profile'])->name('profile');
    Route::get('/workshop-show/{id}',[WorkshopController::class,'workshopShow'])->name('workshopShow');

    Route::get('/faq/{id}',[WorkshopController::class,'workshopFaq'])->name('faq');
});
Route::any('logout', 'Auth\LoginController@logout')->name('logout');
