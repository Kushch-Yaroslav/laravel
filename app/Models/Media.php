<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
    protected $fillable=[
        'gallery_id',
        'file_name',
        'mime_type',
        'size',
        'url'
    ];
    use HasFactory;
}
