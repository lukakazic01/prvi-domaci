<?php

namespace App\Repositories;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{

    public function __construct(
        public Product $productModel
    ) {}

    public function createNew(ProductRequest $request): void
    {
        $path = $request->file('image')->store('uploads', 'public');
        $this->productModel::query()->create([
            ...$request->safe()->except('image'),
            'image' => $path,
        ]);
    }

    public function update(ProductRequest $request, Product $product): void
    {
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
        }
        $product->update([
            ...$request->safe()->except('image'),
            'image' => $path ?: $product->image,
        ]);
    }

    public function getTheLatestAddedProducts(int $limit): Collection
    {
        return $this->productModel::query()->latest('products.id')->limit($limit)->get();
    }
}
