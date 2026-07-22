<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use JetBrains\PhpStorm\NoReturn;

class ShoppingCartController extends Controller
{

    #[NoReturn]
    public function add(CartAddRequest $request)
    {
        return redirect()->back();
    }

}
