<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Repositories\ShoppingCartRepository;
use JetBrains\PhpStorm\NoReturn;

class ShoppingCartController extends Controller
{

    public function index(ShoppingCartRepository $shoppingCartRepository) {
        $products = $shoppingCartRepository->fetchProductsBasedOnSession();
        return view('cart.all', compact('products'));
    }
    #[NoReturn]
    public function add(CartAddRequest $request, ShoppingCartRepository $shoppingCartRepository)
    {
        $shoppingCartRepository->addProductToSession($request);
        return redirect()->route('cart.all');
    }

    #[NoReturn]
    public function delete(ShoppingCartRepository $shoppingCartRepository, string $id) {
        $shoppingCartRepository->deleteProduct($id);
        return redirect()->back();
    }

}
