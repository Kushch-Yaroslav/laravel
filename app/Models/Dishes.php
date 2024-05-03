<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Dishes extends Model
{
    public function orders(): belongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_dish');
    }
    public function gallery(): morphOne
    {
        return $this->morphOne(Gallery::class, 'galleryable');
    }
    protected $fillable = [
      'title',
      'description',
      'price',
      'ingredients'
    ];

    use HasFactory;
}
