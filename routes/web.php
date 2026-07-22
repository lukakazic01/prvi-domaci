<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::view('/about', 'about')->name('about');

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/shop', [ProductController::class, 'index'], )->name('shop');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
});

Route::prefix('/admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    Route::controller(ContactController::class)->prefix('/contacts')->name("contacts.")->group(function () {
        Route::get('/all', 'all')->name('all');
        Route::get('/{contact}/edit', 'edit')->name('edit')->whereNumber('contact');
        Route::post('/store', 'store')->name('store');
        Route::patch('/{contact}', 'update')->name('update')->whereNumber('contact');
        Route::delete('/delete/{contact}', 'delete')->name('delete')->whereNumber('contact');
    });

    Route::controller(ProductController::class)->prefix('/products')->name("products.")->group(function () {
        Route::get('/add', 'add')->name('add');
        Route::get('/all', 'all')->name('all');
        Route::get('/{product}/edit', 'edit')->name('edit')->whereNumber('product');
        Route::post('/store', 'store')->name('store');
        Route::delete('/delete/{product}', 'delete')->name('delete')->whereNumber('product');
        Route::patch('/update/{product}', 'update')->name('update')->whereNumber('product');
    });
});
