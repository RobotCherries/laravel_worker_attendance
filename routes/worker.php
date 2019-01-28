<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('worker')->user();

    //dd($users);

    return view('worker.home');
})->name('home');

