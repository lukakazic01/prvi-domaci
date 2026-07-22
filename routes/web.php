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

    Route::controller(ContactController::class)->group(function () {
        Route::get('/all-contacts', 'allContacts')->name('allContacts');
        Route::get('/contact/{contact}/edit', 'edit')->name('editContact')->whereNumber('contact');
        Route::post('/send-contact', 'sendContact')->name('sendContact');
        Route::patch('/contact/{contact}', 'update')->name('updateContact')->whereNumber('contact');
        Route::delete('/delete-contact/{contact}', 'delete')->name('deleteContact')->whereNumber('contact');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/add-product', 'addProduct')->name('addProduct');
        Route::get('/all-products', 'showProductsForAdmin')->name('allProducts');
        Route::get('/product/{product}/edit', 'edit')->name('editProduct')->whereNumber('product');
        Route::post('/store-product', 'storeProduct')->name('storeProduct');
        Route::delete('/delete-product/{product}', 'delete')->name('products.delete')->whereNumber('product');
        Route::patch('/update-product/{product}', 'update')->name('products.update')->whereNumber('product');
    });
});
