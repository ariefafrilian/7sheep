<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@home');

Route::get('register', 'Auth\RegisterController@register')->name('register');
Route::post('register', 'Auth\RegisterController@postRegister');

Route::get('activate/{encrypt}', 'Auth\AccountActivationController@activate');

Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@postLogin');


Route::get('forgot-password', 'Auth\ForgotPasswordController@forgotPassword')->name('forgot.password');
Route::post('forgot-password', 'Auth\ForgotPasswordController@postForgotPassword');

Route::get('recover-password/{encrypt}', 'Auth\ResetPasswordController@recoverPassword');
Route::patch('reset-password/{encrypt}', 'Auth\ResetPasswordController@resetPassword');

Route::middleware('check')->group(function () {
    Route::resource('users', 'UserController')->except('create');

    Route::resource('posts', 'PostsController')->except('index');

    Route::post('logout', 'Auth\LoginController@logout');
});
