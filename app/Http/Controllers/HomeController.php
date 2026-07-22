<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(ProductRepository $productRepository) {
        $lastSixProducts = $productRepository->getTheLatestAddedProducts(6);
        return view('home', compact('lastSixProducts'));
    }
}
