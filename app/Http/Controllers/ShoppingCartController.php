<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use JetBrains\PhpStorm\NoReturn;

class ShoppingCartController extends Controller
{

    #[NoReturn]
    public function add(CartAddRequest $request)
    {
        session()->put('product', [$request->id => $request->amount]);
        return redirect()->back();
    }

}
