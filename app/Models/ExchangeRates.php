<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(name: 'exchange_rates')]
#[Fillable(['value', 'currency'])]
class ExchangeRates extends Model
{

    const CURRENCY_EUR = "eur";
    const CURRENCY_USD = "usd";
    const CURRENCY_RUB = "rub";
    const AVAILABLE_CURRENCIES = [self::CURRENCY_USD, self::CURRENCY_RUB, self::CURRENCY_EUR];

    public static function getTodayCurrency(string $currency) {
        return self::query()
            ->where(["currency" => $currency])
            ->whereDate("created_at", now())
            ->first();
    }
}
