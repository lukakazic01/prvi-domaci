<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table(name: 'order_items')]
#[Fillable(['order_id', 'product_id', 'amount', 'price'])]
class OrderItem extends Model
{

    public function orders(): BelongsTo {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
