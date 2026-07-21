<?php

namespace App\Services;

use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\Pool;

class ExchangeRateService
{

    public function getRates(string $from, string $to, Factory|Pool $client) {
        return $client->withOptions(['verify' => false])->get(env('EXCHANGE_RATE_API').'/v2/rates', [
            'base' => $from,
            'quotes' => $to,
        ]);
    }

}
