<?php

namespace App\Services\MediaService;

use App\Models\Gallery;
use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class MediaService
{
    public function addUserImage($user,$file): ?Media
    {
        $gallery = $user->gallery ?? $user->gallery()->save(new Gallery());

        $filename =$file->getClientOriginalName();
        $mimeType = $file->getClientMimeType();
        $size = $file->getSize();
        $path = $file->store('public/media/userImage');

        $media = new Media([
            'file_name' => $filename,
            'mime_type' => $mimeType,
            'size' => $size,
            'url' => Storage::url($path),
        ]);
        $gallery->media()->save($media);

        $media->save();
        return $media;
    }
    public function addDishesImage($dish,$file): ?Media
    {
        $gallery = $dish->gallery ?? $dish->gallery()->save(new Gallery());

        $filename =$file->getClientOriginalName();
        $mimeType = $file->getClientMimeType();
        $size = $file->getSize();
        $path = $file->store('public/media/dishesImage');

        $media = new Media([
            'file_name' => $filename,
            'mime_type' => $mimeType,
            'size' => $size,
            'url' => Storage::url($path),
        ]);
        $gallery->media()->save($media);

        $media->save();
        return $media;
    }
    public function getMediaById($userId): ?Media
    {
        return User::find($userId);
    }
}
