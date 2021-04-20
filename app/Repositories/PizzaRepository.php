<?php

namespace App\Repositories;

use App\Models\Pizzas;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PizzaRepository
{


    public static function getListPizzasInDatabase(): ?Collection
    {
        return Pizzas::get()->sortByDesc('id');

    }

    public static function createPizza($request)
    {
        Pizzas::create($request->all());
        return $request->session()->flash('mensagem', 'Cadastro realizado com sucesso!');

    }

    public static function deletePizza($request)
    {
        return (new Pizzas())->where('id', $request->id)->delete();

    }
}
