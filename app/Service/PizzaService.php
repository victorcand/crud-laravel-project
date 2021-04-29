<?php

namespace App\Service;

use App\Repositories\PizzaRepository;
use Illuminate\Support\Collection;

class PizzaService
{

    public function getPizzas($request): ?Collection
    {
        $pizzas = PizzaRepository::getListPizzas();

        if (count($pizzas) == 0) {
            $messageInfo = $request->session()->flash('messageInfo', 'Não há pizza cadastrada!');
        }

        return $pizzas;

    }

    public function createPizzaByForm($request): void
    {
        PizzaRepository::createPizza($request);
        $request->session()->flash('message', 'Cadastro realizado com sucesso!');

        return;
    }

    public function deletePizzaInListPizzas($request): void
    {
        PizzaRepository::deletePizza($request);

        $request->session()
            ->flash('messageDelete', 'Pizza excluída com sucesso!');

        return;
    }

    public function editPizzaInDatabase($request)
    {
        $newName = $request->pizza_name;
        $newPrice = $request->pizza_price;
        $newDescription = $request->pizza_description;

        return PizzaRepository::editPizza($request->id, $newName, $newPrice, $newDescription);

    }

    public function getfilterSearchPizza($request): ?Collection
    {
        return PizzaRepository::getFilter($request);
        
    }
}
