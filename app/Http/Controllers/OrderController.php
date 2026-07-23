<?php

namespace App\Http\Controllers;

use App\Repositories\ShoppingCartRepository;
use App\Services\OrderService;

class OrderController extends Controller
{

    public function create(ShoppingCartRepository $shoppingCartRepository, OrderService $orderService) {
        $orderService->placeAnOrder($shoppingCartRepository);
        session()->forget('products');
        return redirect()->back();
    }

}
