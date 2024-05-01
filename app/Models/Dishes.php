<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dishes extends Model
{
    public function orders(): belongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_dish');
    }
    protected $fillable = [
      'title',
      'description',
      'price',
      'ingredients'
    ];

    use HasFactory;
}
