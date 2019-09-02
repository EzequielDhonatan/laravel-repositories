<?php

Auth::routes(['register' => false]);

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function() {
    
    Route::resource('categories', 'Category\IndexController'); ## CATEGORY (MODULE 1.0)
    Route::any('categories/search', 'Category\IndexController@search')->name('categories.search'); ## SEARCH CATEGORY (MODULE 1.0)
    
    Route::resource('products', 'Product\IndexController'); ## PRODUCT (MODULE 2.0)
    Route::any('products/search', 'Product\IndexController@search')->name('products.search'); ## SEARCH PRODUCT (MODULE 1.0)

    Route::get('/', function () {})->name('admin');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});
