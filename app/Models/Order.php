<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Order extends Model
{
    public function user(): BelongsTo
    {
    return $this->belongsTo(User::class);
    }
    public function orders_to_dishes(): belongsToMany
    {
        return $this->belongsToMany(Order_to_dishes::class);
    }
    use HasFactory;
}
