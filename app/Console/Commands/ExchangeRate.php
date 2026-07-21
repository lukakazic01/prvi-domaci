<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

#[Signature('money:exchange-rate')]
#[Description('Command description')]
class ExchangeRate extends Command
{

    public function handle()
    {
        [$eurResponse, $usdResponse] = Http::pool(fn ($pool) => [
            $pool->withOptions(['verify' => false])->get(env('EXCHANGE_RATE_API').'/v2/rates', [
                'base' => 'EUR',
                'quotes' => 'USD,RSD',
            ]),
            $pool->withOptions(['verify' => false])->get(env('EXCHANGE_RATE_API').'/v2/rates', [
                'base' => 'USD',
                'quotes' => 'EUR,RSD',
            ]),
        ]);
        $statusEur = $eurResponse->getStatusCode() ?? 200;
        $statusUsd = $usdResponse->getStatusCode() ?? 200;
        if ($statusEur >= 400) {
            $this->getOutput()->error("Status: $statusEur \nMessage: {$eurResponse["message"]} \nApi: EUR exchange rate");
            return;
        }
        if ($statusUsd >= 400) {
            $this->getOutput()->error("Status: $statusUsd \nMessage: {$usdResponse["message"]} \nApi: USD exchange rate");
            return;
        }
        $this->getOutput()->success("EUR exchange rates :)");
        dump($eurResponse->json());
        $this->newLine();
        $this->getOutput()->success("USD exchange rates :)");
        dd($usdResponse->json());
    }
}
