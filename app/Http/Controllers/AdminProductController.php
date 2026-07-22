<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;

class AdminProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('admin.products.all', ['products' => $products]);
    }

    public function add() {
        return view('admin.products.add');
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
        return view('admin.products.edit', compact('product'));
    }

    public function update(Product $product, ProductRequest $request, ProductRepository $productRepository) {
        $productRepository->update($request, $product);
        return redirect()->route('admin.products.all');
    }
}
