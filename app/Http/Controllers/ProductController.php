<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function storeProduct(Request $request) {
        $request->validate([
            'name' => 'required|unique:products|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'price' => 'required|gt:0|decimal:2|max:99999',
            'amount' => 'required|integer|gt:0|max_digits:10',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,avif|max:2048',
        ]);
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
}
