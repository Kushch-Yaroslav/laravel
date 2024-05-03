<?php

namespace App\Http\Controllers\MediaController;

use App\Http\Controllers\Controller;
use App\Http\Requests\MediaRequest\MediaRequest;
use App\Models\Dishes;
use App\Models\Media;
use App\Models\User;
use App\Services\MediaService\MediaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    private MediaService $mediaService;
    public function __construct(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
    }

    public function addUserImage(MediaRequest $request, $userId): JsonResponse
    {
        $user = User::findOrFail($userId);
        $file = $request->validated()['file'];
        $media = $this->mediaService->addUserImage($user, $file);
        return new JsonResponse($media,201);
    }
    public function addDishesImage(MediaRequest $request, $dishId): JsonResponse
    {
        $dish = Dishes::findOrFail($dishId);
        $file = $request->validated()['file'];
        $media = $this->mediaService->addDishesImage($dish, $file);
        return new JsonResponse($media,201);
    }
    public function getUserImage($userId): JsonResponse
    {
        $getMedia = $this->mediaService->getMediaById($userId);
        return new JsonResponse($getMedia,200);
    }
}
