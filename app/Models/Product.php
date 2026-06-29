<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property string $image
 * @property int $amount
 * @property Carbon $created_at
 */
class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'price', 'description', 'amount', 'image'];
}
