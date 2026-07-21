<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(name: 'exchange_rates')]
#[Fillable(['value', 'currency'])]
class ExchangeRates extends Model
{
    //
}
