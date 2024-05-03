<?php

namespace App\Http\Controllers\ImageController;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest\ImageRequest;
use App\Models\Gallery;
use Illuminate\Http\JsonResponse;

class ImageController extends Controller
{
    private ImageService $imageService;

    public function __construct(ImageService  $imageService)
    {
        $this->imageService = $imageService;
    }

    public function createImage(ImageRequest $request): JsonResponse
    {
        $createImage =$this->imageService->createImage($request->validated());
        return new JsonResponse($createImage,201);
    }

    public function getImage(?Gallery $image): JsonResponse
    {
        $getImage =$this->imageService->findImageById($image);
        return new JsonResponse($getImage,200);
    }
}
