<?php

namespace App\Services\OrderToDishesService;

use App\Models\Order;
use App\Models\Order_to_dishes;
use Illuminate\Database\Eloquent\Collection;

class OrderToDishesService
{
    public function createOD(array $data): Order_to_dishes
    {
        $od = new Order_to_dishes($data);
        $od->save();
        return $od;
    }

    public function findODbyId(int $id): ?Order_to_dishes
    {
        return Order_to_dishes::find($id);
    }

    public function findAllOD():Collection
    {
        return Order_to_dishes::all();
    }

    public function updateOD(int $id, array $data): ?Order_to_dishes
    {
        $od = Order_to_dishes::findOrFail($id);
        $od->update($data);
        return $od;
    }

    public function deleteOD(int $id): bool
    {
        return Order_to_dishes::destroy($id);
    }
}
