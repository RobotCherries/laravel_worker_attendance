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

// Authentication
Auth::routes();
Route::get('functions/get/{id}', 'Auth\RegisterController@getFunctions');

// Pages
Route::get('/acasa', 'HomeController@index')->name('home');
Route::get('/instructiuni', 'InstructionsController@index')->name('instructions');
Route::get('/pontare', 'ClockingController@index')->name('clocking');
Route::prefix('panou')->group(function () {
    Route::get('/', 'DashboardController@index')->name('panel_index');
    Route::get('/muncitori', 'UsersController@index')->name('panel_users');
    Route::get('/muncitori/adauga', 'UsersController@create')->name('panel_users_create');
    Route::get('/muncitori/{id}', 'UsersController@show')->name('panel_users_show');
});
Route::get('/setari', 'SettingsController@index')->name('settings');