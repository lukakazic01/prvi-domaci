<?php

namespace App\Console\Commands;

use App\Services\ExchangeRateService;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

#[Signature('money:exchange-rate')]
#[Description('Command description')]
class ExchangeRate extends Command
{
    public function __construct(
       private readonly ExchangeRateService $exchangeRateService
    ) {
        parent::__construct();
    }

    public function handle(): void
    {
        [$eurResponse, $usdResponse] = Http::pool(fn ($pool) => [
            $this->exchangeRateService->getRates("EUR", "RSD,USD", $pool),
            $this->exchangeRateService->getRates("USD", "RSD,EUR", $pool),
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
