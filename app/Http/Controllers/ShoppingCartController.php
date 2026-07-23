<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\Product;
use JetBrains\PhpStorm\NoReturn;

class ShoppingCartController extends Controller
{

    public function index() {
        $productSession = session()->get('products', []);
        $amounts = array_column($productSession, 'amount', 'product_id');
        $products = Product::query()
            ->whereIn('id', array_keys($amounts))
            ->get()
            ->map(function ($product) use ($amounts) {
                $product->quantity = $amounts[$product->id];
                return $product;
            });
        return view('cart.all', compact('products'));
    }
    #[NoReturn]
    public function add(CartAddRequest $request)
    {
        session()->push('products', [
            "product_id" => $request->id,
            "amount" => $request->amount
        ]);
        return redirect()->route('cart.all');
    }

}
