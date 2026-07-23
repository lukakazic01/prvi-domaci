<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\Product;
use App\Repositories\ShoppingCartRepository;
use JetBrains\PhpStorm\NoReturn;

class ShoppingCartController extends Controller
{

    public function index(ShoppingCartRepository $shoppingCartRepository) {
        $products = $shoppingCartRepository->fetchProductsBasedOnSession();
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
