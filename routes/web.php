<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::view('/about', 'about')->name('about');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [ProductController::class, 'index'], )->name('shop');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/send-contact', [ContactController::class, 'sendContact']);

Route::prefix('/admin')->group(function(){
    Route::get('/all-contacts', [ContactController::class, 'allContacts'])->name('allContacts');
    Route::get('/add-product', [ProductController::class, 'addProduct'])->name('addProduct');
    Route::post('/store-product', [ProductController::class, 'storeProduct']);
    Route::get('/products', [ProductController::class, 'showProductsForAdmin'])->name('adminProducts');
});
