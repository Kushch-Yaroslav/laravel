<?php

namespace App\Services\ImageService;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Collection;

class GalleryService
{
    public function createImage(array $data): Gallery
    {
        $image = Gallery::create([
            'image_name' => $data['image_name'],
            'image_path' => $data['image_path'],
        ]);
        $image->save();
        return $image;
    }
    public function findImageById($image): ?Gallery
    {
        return $image;
    }
}
