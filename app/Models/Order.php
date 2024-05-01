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
    public function dishes(): belongsToMany
    {
        return $this->belongsToMany(Dishes::class, 'order_dish');
    }
    protected $fillable =[
      'user_id',
      'status',
      'payment_method',
    ];
    use HasFactory;
}
