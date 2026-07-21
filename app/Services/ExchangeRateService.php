<?php

namespace App\Services;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Client\Promises\LazyPromise;
use Illuminate\Http\Client\Response;

class ExchangeRateService
{

    public function getRates(string $currency, Factory|Pool $client): LazyPromise|PromiseInterface|Response
    {
        return $client->withOptions(['verify' => false])->get(env('EXCHANGE_RATE_API') . "/v1/currencies/$currency/rates/today");
    }
}
