<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Routing\Route;

class ShopController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('shop', ['products' => $products]);
    }
}
