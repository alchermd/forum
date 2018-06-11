<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/threads', 'ThreadController@index');
Route::get('/threads/{thread}', 'ThreadController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
