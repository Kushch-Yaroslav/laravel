<?php

namespace App\Http\Controllers\DishesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\DishesRequest\DishesRequest;
use App\Http\Requests\DishesRequest\DishesUpdateRequest;
use App\Services\DishesService\DishesService;
use Illuminate\Http\JsonResponse;

class DishesController extends Controller
{
    private DishesService $dishesService;

    public function __construct( DishesService $dishesService){
        $this->dishesService = $dishesService;
    }
    public function createDishes(DishesRequest $request):JsonResponse
    {
        $createDishes = $this->dishesService->createDishes($request->validated());
        return new JsonResponse($createDishes,201);
    }
    public function getDishes(string $id): JsonResponse
    {
        $getDishes = $this->dishesService->findDishesById($id);
        return new JsonResponse($getDishes,200);
    }
    public function getAllDishes():JsonResponse
    {
        $getAllDishes = $this->dishesService->findAllDishes();
        return new JsonResponse($getAllDishes,200);
    }
    public function editDishes(DishesUpdateRequest $request, string $id):JsonResponse
    {
        $editDishes = $this->dishesService->updateDishes($id,$request->validated());
        return new JsonResponse($editDishes,200);
    }
    public function removeDishes(string $id):JsonResponse
    {
        $removeDishes = $this->dishesService->deleteDishes($id);
        return new JsonResponse($removeDishes,204);
    }
}
