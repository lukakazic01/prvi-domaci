<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $lastSixProducts = Product::query()->latest('products.id')->limit(6)->get();
        return view('home', compact('lastSixProducts'));
    }
}
