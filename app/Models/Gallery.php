<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Gallery extends Model
{
    use HasFactory;

    public function galleryable(): morphTo
    {
        return $this->morphTo();
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
