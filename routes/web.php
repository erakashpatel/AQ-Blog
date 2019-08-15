<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index')->name('index');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

register: {
    Auth::enableRegistration();

    if (Auth::isRegistrationEnabled()) {
        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register');
    }
}

login: {
    Auth::enableLogin();

    if (Auth::isLoginEnabled()) {
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    }
}

password_reset: {
    Auth::enableReset();

    if (Auth::isResetEnabled()) {
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    }
}

verification: {
    Auth::enableVerification();

    if (Auth::isVerifyEnabled()) {
        Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
        Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
        Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
    }
}
