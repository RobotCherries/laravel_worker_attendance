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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'worker'], function () {
  Route::get('/login', 'WorkerAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'WorkerAuth\LoginController@login');
  Route::post('/logout', 'WorkerAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'WorkerAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'WorkerAuth\RegisterController@register');

  Route::post('/password/email', 'WorkerAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'WorkerAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'WorkerAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'WorkerAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'manager'], function () {
  Route::get('/login', 'ManagerAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'ManagerAuth\LoginController@login');
  Route::post('/logout', 'ManagerAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'ManagerAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'ManagerAuth\RegisterController@register');

  Route::post('/password/email', 'ManagerAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'ManagerAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'ManagerAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'ManagerAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});
