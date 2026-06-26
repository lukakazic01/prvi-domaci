<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;


Route::view('/about', 'about')->name('about');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index'], )->name('shop');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::prefix('/admin')->group(function(){
    Route::get('/all-contacts', [ContactController::class, 'allContacts'])->name('allContacts');
});
