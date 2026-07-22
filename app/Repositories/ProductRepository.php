<?php

namespace App\Repositories;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductRepository
{

    public function __construct(
        public Product $productModel
    ) {}

    public function createNew(ProductRequest $request) {
        $path = $request->file('image')->store('uploads', 'public');
        $this->productModel->newQuery()->create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            'image' => $path,
        ]);
    }

    public function update(ProductRequest $request, Product $product) {
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
    }

    public function getTheLatestAddedProducts(int $limit) {
        return $this->productModel->newQuery()->latest('products.id')->limit($limit)->get();
    }
}
