<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('shop', ['products' => $products]);
    }

}
