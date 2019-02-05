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
Route::get('register/functions/get/{id}', 'Auth\RegisterController@getFunctions');

// Pages
Route::get('/acasa', 'HomeController@index')->name('home');
Route::get('/instructiuni', 'InstructionsController@index')->name('instructions');
Route::get('/pontare', 'ClockingController@index')->name('clocking');
Route::prefix('panou')->group(function () {
    Route::get('/', 'DashboardController@index')->name('panel_index');
    Route::get('/muncitori', 'UsersController@index')->name('panel_users');
    // Add
    Route::get('/muncitori/adauga', 'UsersController@create')->name('panel_users_create');
    // Show
    Route::get('/muncitori/{id}', 'UsersController@show')->name('panel_users_show');
    // Clocking
    Route::get('/muncitori/{id}/pontare', 'UsersController@clockings')->name('panel_users_clockings');
    Route::post('/muncitori/{id}/pontare', 'UsersController@clockings_store')->name('panel_users_clockings_store');
    Route::delete('/muncitori/{id}/pontare/{clocking_id}/sterge', 'UsersController@clockings_destroy')->name('panel_users_clockings_delete');
    // Edit
    Route::get('/muncitori/{id}/modifica', 'UsersController@edit')->name('panel_users_edit');
    Route::get('/muncitori/{id}/modifica/functions/get/{department_id}', 'UsersController@getFunctions');
    // Update
    Route::put('/muncitori/{id}/actualizeaza', 'UsersController@update')->name('panel_users_update');
    // Delete
    Route::delete('/muncitori/{id}/sterge', 'UsersController@destroy')->name('panel_users_delete');
});
Route::get('/setari', 'SettingsController@index')->name('settings');