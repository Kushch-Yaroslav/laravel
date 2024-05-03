<?php

namespace App\Services\DishesService;

use App\Models\Dishes;
use Illuminate\Database\Eloquent\Collection;


class DishesService
{
    public function createDishes(array $data): Dishes
    {
//        $dishes = new Dishes($data);
//        $dishes->save();
        $dishes = Dishes::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'ingredients' => json_encode($data['ingredients']),
        ]);
        $dishes->save();
        return $dishes;
    }

    /**
     * @param $dishesId
     * @return Dishes|null
     */
    public function findDishesById(int $dishesId): ?Dishes
    {
        $dish = Dishes::find($dishesId);
        $dish->ingredients = json_decode($dish->ingredients,true);
        return $dish;
    }

    /**
     * @return Collection
     */
    public function findAllDishes(): Collection
    {
        return Dishes::all()->map(function ($dish){
            $dish->ingredients = json_decode($dish->ingredients,true);
        return $dish;
        });
    }


    /**
     * @param int $dishesId
     * @param array $data
     * @return Dishes|null
     */
    public function updateDishes(int $dishesId, array $data): ?Dishes
    {
        $dishes= Dishes::findOrFail($dishesId);
        $dishes->update(
            [
                'title' => $data['title'],
                'description' => $data['description'],
                'price' => $data['price'],
                'ingredients' => json_encode($data['ingredients']),
            ]
        );
        return $dishes->fresh();
    }

    /**
     * @param $dishesId
     * @return null
     */
    public function deleteDishes(int $dishesId)
    {
        return Dishes::destroy($dishesId);
    }

}

