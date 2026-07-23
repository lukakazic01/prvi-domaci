<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Repositories\ShoppingCartRepository;

class OrderController extends Controller
{

    public function create(ShoppingCartRepository $shoppingCartRepository, OrderRepository $orderRepository) {
        $orderRepository->placeAnOrder($shoppingCartRepository);
        session()->forget('products');
        return redirect()->back();
    }

}
