<?php

namespace App\Http\Controllers\OrderToDishesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderToDishesRequest\OrderToDishesRequest;
use App\Services\OrderToDishesService\OrderToDishesService;
use Illuminate\Http\JsonResponse;

class OrderToDishesController extends Controller
{
    private OrderToDishesService $orderToDishesService;
    public function __construct(OrderToDishesService $orderToDishesService)
    {
        $this->orderToDishesService = $orderToDishesService;
    }

    public function createOD(OrderToDishesRequest $request):JsonResponse
    {
        $createOD = $this->orderToDishesService->createOD($request->validated());
        return new JsonResponse($createOD,201);
    }

    public function getOD(string $id):JsonResponse
    {
        $getOD = $this->orderToDishesService->findODbyId($id);
        return new JsonResponse($getOD,200);
    }

    public function getAllOD():JsonResponse
    {
        $getAllOD = $this->orderToDishesService->findAllOD();
        return new JsonResponse($getAllOD,200);
    }
    public function editOD(OrderToDishesRequest $request, string $id):JsonResponse
    {
        $editOD = $this->orderToDishesService->updateOD($id, $request->validated());
        return new JsonResponse($editOD,200);
    }
    public function removeOD(string $id):JsonResponse
    {
        $deleteOD = $this->orderToDishesService->deleteOD($id);
        return new JsonResponse($deleteOD,204);
    }
}
