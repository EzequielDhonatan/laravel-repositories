<?php

Auth::routes(['register' => false]);

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function() {

    Route::resource('users', 'User\IndexController'); ## USER (MODULE 5.0)
    Route::any('users/search', 'User\IndexController@search')->name('users.search'); ## SEARCH PRODUCT (MODULE 5.0)
    
    Route::resource('categories', 'Category\IndexController'); ## CATEGORY (MODULE 1.0)
    Route::any('categories/search', 'Category\IndexController@search')->name('categories.search'); ## SEARCH CATEGORY (MODULE 1.0)
    
    Route::resource('products', 'Product\IndexController'); ## PRODUCT (MODULE 2.0)
    Route::any('products/search', 'Product\IndexController@search')->name('products.search'); ## SEARCH PRODUCT (MODULE 2.0)

    Route::get('/', 'Dashboard\IndexController@index')->name('admin');
});

Route::group(['namespace' => 'Site'], function() {

    ## SITE (MODULE 4.0)
    Route::get('/', 'Home\IndexController@index');

});
