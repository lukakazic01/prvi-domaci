<?php

use App\Models\ShopItem;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/contact', 'contact');
Route::view('/about', 'about');
Route::get('/shop', function () {
    $items = ShopItem::all();
    return view('shop', ['items' => $items]);
});
