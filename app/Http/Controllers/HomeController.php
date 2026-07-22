<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;

class HomeController extends Controller
{
    public function index(ProductRepository $productRepository) {
        $lastSixProducts = $productRepository->getTheLatestAddedProducts(6);
        return view('home', compact('lastSixProducts'));
    }
}
