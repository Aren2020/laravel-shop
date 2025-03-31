<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'App\Http\Controllers\Category'], function () {
    Route::get('/categories', 'IndexController')->name('category.index');
    Route::get('/categories/{id}', 'ShowController')->name('category.show');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('/categories', 'StoreController')->name('category.store')->middleware('role:admin');
        Route::put('/categories/{id}', 'UpdateController')->name('category.update')->middleware('role:admin');
        Route::delete('/categories/{id}', 'DestroyController')->name('category.destroy')->middleware('role:admin');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Product'], function () {
    Route::get('/products', 'IndexController')->name('product.index');
//    Route::get('/products/create', 'CreateController')->name('product.create');
    Route::post('/products', 'StoreController')->name('product.store');
    Route::get('/products/{slug}/', 'ShowController')->name('product.show');
//    Route::get('/products/{slug}/edit', 'EditController')->name('product.edit');
    Route::put('/products/{slug}', 'UpdateController')->name('product.update');
    Route::delete('/products/{slug}', 'DestroyController')->name('product.destroy');
});

Route::group(['namespace' => 'App\Http\Controllers\Order'], function () {
    Route::get('/orders', 'IndexController')->name('order.index');
    Route::get('/orders/{id}', 'ShowController')->name('order.show');

    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('/orders/', 'StoreController')->name('order.store');
        Route::delete('/orders/{id}', 'DestroyController')->name('order.destroy');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Auth', 'prefix' => 'auth'], function () {

    Route::post('/login', 'LoginController')->name('login');
    Route::post('/register', 'RegisterController')->name('register');
    Route::post('/refresh', 'RefreshController')->name('refresh');

    Route::group(['middleware' => ['auth:api']], function () {
        Route::get('/user', 'UserController')->name('user.show');
        Route::post('/logout', 'LogoutController')->name('logout');
    });
});

