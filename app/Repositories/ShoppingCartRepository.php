<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Container\EntryNotFoundException;
use Illuminate\Contracts\Container\CircularDependencyException;
use Illuminate\Database\Eloquent\Collection;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ShoppingCartRepository
{

    /**
     * @return Collection<int, Product>
     */
    public function fetchProductsBasedOnSession(): Collection
    {
        $amounts = array_column(session()->get('products', []), 'amount', 'product_id');
        return Product::query()
            ->whereIn('id', array_keys($amounts))
            ->get()
            ->map(function ($product) use ($amounts) {
                $product->quantity = $amounts[$product->id];
                return $product;
            });
    }

    public function deleteProduct(string $productId) {
        $products = session()->get('products', []);
        $productsWithoutDeletedOne = array_values(array_filter($products, function($product) use ($productId) {
            return $product["product_id"] !== $productId;
        }));
        session()->put('products', $productsWithoutDeletedOne);
    }

}
