<?php

namespace App\Repositories;

use App\Models\Pizzas;
use Illuminate\Support\Collection;

class PizzaRepository
{

    public static function getListPizzasInDatabase(): ?Collection
    {
        return Pizzas::get()->sortByDesc('id');

    }

    public static function createPizza($request): ?Pizzas
    {
        return Pizzas::create($request->all());

    }

    public static function deletePizza($request): void
    {
        $pizza = new Pizzas();
        $pizza->where('id', $request->id)->delete();

        return;

    }

    public static function editPizza($id, $newName, $newPrice, $newDescription): void
    {
        $pizza = Pizzas::find($id);
        $pizza->pizza_name = $newName;
        $pizza->pizza_price = $newPrice;
        $pizza->pizza_description = $newDescription;
        $pizza->save();

        return;
    }

    public static function getFilter($request): ?Collection
    {
        $search = $request->search;
        return Pizzas::where('pizza_name', 'like', '%' . $search . '%')
            ->orWhere('pizza_price', 'like', '%' . $search . '%')
            ->orWhere('pizza_description', 'like', '%' . $search . '%')->get();

    }

}
