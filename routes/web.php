<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::view('/about', 'about')->name('about');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [ProductController::class, 'index'], )->name('shop');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/send-contact', [ContactController::class, 'sendContact'])->name('sendContact');
Route::delete('/delete-contact/{contact}', [ContactController::class, 'delete'])->name('deleteContact');

Route::prefix('/admin')->group(function(){
    Route::get('/all-contacts', [ContactController::class, 'allContacts'])->name('admin.allContacts');
    Route::get('/contact/{contact}/edit', [ContactController::class, 'edit'])->name('admin.editContact');
    Route::patch('/contact/{contact}', [ContactController::class, 'update'])->name('admin.updateContact');

    Route::get('/add-product', [ProductController::class, 'addProduct'])->name('admin.addProduct');
    Route::get('/all-products', [ProductController::class, 'showProductsForAdmin'])->name('admin.allProducts');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('admin.editProduct');
    Route::post('/store-product', [ProductController::class, 'storeProduct'])->name('admin.storeProduct');
    Route::delete('/delete-product/{product}', [ProductController::class, 'delete'])->name('admin.products.delete');
    Route::patch('/update-product/{product}', [ProductController::class, 'update'])->name('admin.products.update');
});
