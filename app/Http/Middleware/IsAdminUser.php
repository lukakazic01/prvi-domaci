<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminUser
{

    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            abort(403, 'This page is allowed only for admins!');
        }
        return $next($request);
    }
}
