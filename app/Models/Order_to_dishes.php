<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Order_to_dishes extends Model
{
    public function ordersToDishes():HasManyThrough
    {
        return $this->hasManyThrough(Order::class, Dishes::class);
    }
    protected $fillable =[
        'dish_id',
        'order_id'
    ];
    use HasFactory;
}
