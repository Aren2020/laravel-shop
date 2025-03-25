<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\MyPageController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::group(['namespace' => 'App\Http\Controllers\Category'], function () {
    Route::get('/categories', 'IndexController')->name('category.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Product'], function () {
    Route::get('/products', 'IndexController')->name('product.index');
    Route::get('/products/create', 'CreateController')->name('product.create');
    Route::post('/products', 'StoreController')->name('product.store');
    Route::get('/products/{slug}/', 'ShowController')->name('product.show');
    Route::get('/products/{slug}/edit', 'EditController')->name('product.edit');
    Route::put('/products/{slug}', 'UpdateController')->name('product.update');
    Route::delete('/products/{slug}', 'DestroyController')->name('product.destroy');
});
