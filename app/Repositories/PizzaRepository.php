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
}
