<?php

namespace App\Repositories;

use App\Models\Pizzas;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PizzaRepository
{

    public static function getListPizzas(): ?Collection
    {
        return Pizzas::get()->sortByDesc('id');

    }

    public static function createPizza(Request $request): ?Pizzas
    {
        return Pizzas::create($request->all());

    }

    public static function deletePizza(Request $request): void
    {
        $pizza = new Pizzas();
        $pizza->where('id', $request->id)->delete();

        return;

    }

    public static function getPizza(int $id): Pizzas
    {
        return $pizza = Pizzas::find($id);
    
    }

    public static function updatePizza(int $id, string $newName, float $newPrice, string $newDescription): void
    {
        $pizza = Pizzas::where(['id'=>$id])->update([
            'pizza_name'=>$newName,
            'pizza_price'=>$newPrice,
            'pizza_description'=>$newDescription,
        ]);

        return;
    }

    public static function getFilter(Request $request): ?Collection
    {
        $search = $request->search;
        return Pizzas::where('pizza_name', 'like', '%' . $search . '%')
            ->orWhere('pizza_description', 'like', '%' . $search . '%')->get();

    }

}
