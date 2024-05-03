<?php

namespace App\Services\OrderService;

use App\Models\Dishes;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;


class OrderService
{
    /**
     * @param $order
     * @return Order|null
     */
    public function findOrderById($order): ?Order
    {
        return $order;
    }

    /**
     * @return Collection
     */
    public function findAllOrders(): Collection
    {
        return Order::all();
    }

    /**
     * @param int $orderId
     * @param array $data
     * @return Order|null
     */
    public function updateOrder(int $orderId, array $data): ?Order
    {
        $order= Order::findOrFail($orderId);
        $order->update(
            [   'user_id' => $data['user_id'],
                'status'=>$data['status'],
                'payment_method'=>$data['payment_method'],
                'total_price'=>$data['total_price']]
        );
        return $order->fresh();
    }


    /**
     * @param $order
     * @return mixed
     */
    public function deleteOrder($order)
    {
        return $order->delete();
    }

    public function addOrder(array $data,$user): ?Order
    {
        $order = new Order();
        $order->user_id =$user;
        $order->status=$data['status'];
        $order->payment_method = $data['payment_method'];
        $order->total_price = $this->calculationSum($data['dish']) ?? null;
        $order->save();

        $order->dishes()->sync($data['dish']);

        return $order->load('dishes');
    }

    /**
     * @param array $dishIds
     * @return int
     */
    protected function calculationSum(array $dishIds): int
    {
        $sum = 0;
        foreach ($dishIds as $dishId) {
            $dish = Dishes::find($dishId);
            $sum += $dish->price;
        }
        return $sum;
    }
}

