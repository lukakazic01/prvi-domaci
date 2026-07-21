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
        $currencies = ["eur", "usd", "rub"];
        foreach ($currencies as $currency) {
            $data = $exchangeRateService->getRates($currency, Http::getFacadeRoot());
            $doesCurrencyForTodayExists = ExchangeRates::query()
                ->where(["currency" => "eur"])
                ->whereDate("created_at", now())
                ->exists();
            if ($doesCurrencyForTodayExists) continue;
            ExchangeRates::query()->create([
                "currency" => $currency,
                "value" => $data->json()["exchange_middle"]
            ]);
        }
    }
}
