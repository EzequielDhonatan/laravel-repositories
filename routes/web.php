<?php

Route::resource('admin/categories', 'Admin\Category\IndexController');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
