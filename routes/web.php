<?php

Route::get('admin', function () {

})->name('admin');

Route::resource('admin/categories', 'Admin\Category\IndexController');
Route::any('admin/categories/search', 'Admin\Category\IndexController@search')->name('categories.search');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
