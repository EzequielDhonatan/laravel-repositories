<?php

Auth::routes();

Route::get('admin', function () {

})->name('admin');

Route::resource('admin/categories', 'Admin\Category\IndexController'); ## CATEGORY (MODULE 1.0)
Route::any('admin/categories/search', 'Admin\Category\IndexController@search')->name('categories.search'); ## SEARCH CATEGORY (MODULE 1.0)

Route::resource('admin/products', 'Admin\Product\IndexController'); ## PRODUCT (MODULE 2.0)

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});
