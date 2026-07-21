<?php

namespace App\Console\Commands;

use App\Models\ExchangeRates;
use App\Services\ExchangeRateService;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

#[Signature('currency:exchange-rates')]
#[Description('Command description')]
class ExchangeRate extends Command
{

    public function handle(ExchangeRateService $exchangeRateService): void
    {
        foreach (ExchangeRates::AVAILABLE_CURRENCIES as $currency) {
            $data = $exchangeRateService->getRates($currency, Http::getFacadeRoot());
            $todayCurrency = ExchangeRates::getTodayCurrency($currency);
            if ($todayCurrency) continue;
            ExchangeRates::query()->create([
                "currency" => $currency,
                "value" => $data->json()["exchange_middle"]
            ]);
        }
    }
}
