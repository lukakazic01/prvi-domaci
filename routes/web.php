<?php

use App\Models\ShopItem;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/contact', 'contact')->name('contact');
Route::view('/about', 'about')->name('about');
Route::get('/shop', function () {
    $items = ShopItem::all();
    return view('shop', ['items' => $items]);
})->name('shop');
