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


Auth::routes(['verify' => true]);

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// Route::get('{path}/{}','WelcomeController@index')->where( 'path', '([A-z]+)?' );


Route::group(['prefix'=>'admin','namespace'=>'Admin','as' => 'admin.'], function(){

  Route::get('/dashboard', 'AdminController@index')->name('dashboard');

  Route::get('login', 'Auth\AdminLoginController@login')->name('login');
  Route::post('login', 'Auth\AdminLoginController@loginAdmin')->name('login');
  Route::post('logout', 'Auth\AdminLoginController@logout')->name('logout');

  Route::get('register', 'Auth\AdminRegisterController@showRegistrationForm')->name('register');
  Route::post('register', 'Auth\AdminRegisterController@register');

   Route::get('password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('password.request');
   Route::post('password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('password.email');
   Route::get('password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('password.reset');
   Route::post('password/reset', 'Auth\AdminResetPasswordController@reset')->name('password.update');

   Route::get('password/confirm', 'Auth\AdminConfirmPasswordController@showConfirmForm')->name('password.confirm');
   Route::post('password/confirm', 'Auth\AdminConfirmPasswordController@confirm');

   // Route::get('email/verify', 'Auth\AdminVerificationController@show')->name('verification.notice');
   // Route::get('email/verify/{id}', 'Auth\AdminVerificationController@verify')->name('verification.verify');
   // Route::get('email/resend', 'Auth\AdminVerificationController@resend')->name('verification.resend');


   Route::get('/{any}', 'AdminController@index')->where('any', '.*');

});


Route::get('/{any}', 'WelcomeController@index')->where('any', '.*');