<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('shop', ['products' => $products]);
    }

    public function showProductsForAdmin() {
        $products = Product::all();
        return view('admin.allProducts', ['products' => $products]);
    }

    public function addProduct() {
        return view('admin.addProduct');
    }

    public function delete(Product $product) {
        $product->delete();
        return redirect()->back();
    }

    public function storeProduct(ProductRequest $request) {
        $path = $request->file('image')->store('uploads', 'public');
        Product::query()->create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            'image' => $path,
        ]);
        return redirect()->route('admin.allProducts');
    }

    public function edit(Product $product) {
        return view('admin.editProduct', compact('product'));
    }

    public function update(Product $product, ProductRequest $request) {
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
        }
        $product->update([
            'name' => $request->input('name') ?: $product->name,
            'price' => $request->input('price') ?: $product->price,
            'amount' => $request->input('amount') ?: $product->amount,
            'description' => $request->input('description') ?: $product->description,
            'image' => $path ?: $product->image,
        ]);
        return redirect()->route('admin.allProducts');
    }
}
