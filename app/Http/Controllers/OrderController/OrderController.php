<?php

namespace App\Http\Controllers\OrderController;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest\OrderRequest;
use App\Models\Order;
use App\Services\OrderService\OrderService;
use http\Env\Request;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    private OrderService $orderService;
    public function __construct( OrderService $orderService){
       $this->orderService = $orderService;
    }

    /**
     * @param OrderRequest $request
     * @return JsonResponse
     */
    public function createOrder(OrderRequest $request):JsonResponse
    {
       $createOrder = $this->orderService->addOrder($request->validated());
        return new JsonResponse($createOrder,201);
    }

    /**
     * @param Order|null $order
     * @return JsonResponse
     */
    public function getOrder(?Order $order): JsonResponse
    {
        $getOrder = $this->orderService->findOrderById($order);
        return new JsonResponse($getOrder,200);
    }

    /**
     * @return JsonResponse
     */
    public function getAllOrders():JsonResponse
    {
        $getAllOrders = $this->orderService->findAllOrders();
        return new JsonResponse($getAllOrders,200);
    }

    /**
     * @param OrderRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function editOrder(OrderRequest $request, int $id):JsonResponse
    {
        $editOrder = $this->orderService->updateOrder($id,$request->validated());
        return new JsonResponse($editOrder,200);
    }

    /**
     * @param Order|null $order
     * @return JsonResponse
     */
    public function removeOrder(?Order $order):JsonResponse
    {
        $removeOrder = $this->orderService->deleteOrder($order);
        return new JsonResponse($removeOrder,204);
    }
}
