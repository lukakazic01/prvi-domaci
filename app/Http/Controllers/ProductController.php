<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    public function index(ProductRepository $productRepository) {
        $products = Product::all();
        return view('shop', ['products' => $products]);
    }

    public function all() {
        $products = Product::all();
        return view('admin.allProducts', ['products' => $products]);
    }

    public function add() {
        return view('admin.addProduct');
    }

    public function delete(Product $product) {
        $product->delete();
        return redirect()->back();
    }

    public function store(ProductRequest $request, ProductRepository $productRepository) {
        $productRepository->createNew($request);
        return redirect()->route('admin.products.all');
    }

    public function edit(Product $product) {
        return view('admin.editProduct', compact('product'));
    }

    public function update(Product $product, ProductRequest $request, ProductRepository $productRepository) {
        $productRepository->update($request, $product);
        return redirect()->route('admin.products.all');
    }
}
