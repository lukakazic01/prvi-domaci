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
    Route::delete('/delete-contact/{contact}', [ContactController::class, 'delete'])->name('deleteContact')->whereNumber('contact');
});

Route::prefix('/admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/all-contacts', [ContactController::class, 'allContacts'])->name('allContacts');
    Route::get('/contact/{contact}/edit', [ContactController::class, 'edit'])->name('editContact')->whereNumber('contact');
    Route::post('/send-contact', [ContactController::class, 'sendContact'])->name('sendContact');
    Route::patch('/contact/{contact}', [ContactController::class, 'update'])->name('updateContact')->whereNumber('contact');

    Route::get('/add-product', [ProductController::class, 'addProduct'])->name('addProduct');
    Route::get('/all-products', [ProductController::class, 'showProductsForAdmin'])->name('allProducts');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('editProduct')->whereNumber('product');
    Route::post('/store-product', [ProductController::class, 'storeProduct'])->name('storeProduct');
    Route::delete('/delete-product/{product}', [ProductController::class, 'delete'])->name('products.delete')->whereNumber('product');
    Route::patch('/update-product/{product}', [ProductController::class, 'update'])->name('products.update')->whereNumber('product');
});
