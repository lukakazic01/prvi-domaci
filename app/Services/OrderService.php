<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Repositories\ShoppingCartRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class OrderService
{

    public function placeAnOrder(ShoppingCartRepository $shoppingCartRepository): void {
        DB::transaction(function () use ($shoppingCartRepository) {
            $products = $shoppingCartRepository->fetchProductsBasedOnSession();
            if ($products->isEmpty()) {
                throw ValidationException::withMessages([
                    'cart' => ['Your shopping cart is empty.'],
                ]);
            }
            $products->each(function (Product $product) {
                if ($product->quantity > $product->amount) {
                    throw ValidationException::withMessages([
                        'cart' => "Product $product->name is out of stock"
                    ]);
                }
            });
            $totalPrice = $products->reduce(fn ($totalPrice, $product) => $totalPrice + ($product->price * $product->quantity), 0);
            $order = Order::query()->create([
                'user_id' => auth()->id(),
                'price' => $totalPrice,
            ]);
            $orderItems = $products->map(fn ($product) => [
                'product_id' => $product->id,
                'amount' => $product->quantity,
                'price' => $product->price,
            ]);
            $order->orderItems()->createMany($orderItems);
            $products->each(fn ($product) => $product->decrement('amount', $product->quantity));
        });
    }

}
