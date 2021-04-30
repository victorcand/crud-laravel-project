<?php

namespace App\Service;

use App\Models\Pizzas;
use App\Repositories\PizzaRepository;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class PizzaService
{

    public function getPizzas(Request $request): ?Collection
    {
        $pizzas = PizzaRepository::getListPizzas();

        if (empty($pizzas[0])) {
            $request->session()->flash('messageInfo', 'Não há pizza cadastrada!');
        }

        return $pizzas;

    }

    public function createPizzaByForm(Request $request): void
    {
        PizzaRepository::createPizza($request);
        $request->session()->flash('message', 'Cadastro realizado com sucesso!');

        return;
    }

    public function deletePizzaInListPizzas(Request $request): void
    {
        PizzaRepository::deletePizza($request);

        $request->session()
            ->flash('messageDelete', 'Pizza excluída com sucesso!');

        return;
    }

    public function updatePizzaById(int $id,Request $request)
    {
        $newName = $request->pizza_name;
        $newPrice = $request->pizza_price;
        $newDescription = $request->pizza_description;
        
        if(empty($newName) || empty($newPrice) || empty($newDescription) ){
            return $request->session()->flash('messageErro', 'Preencha os dados corretamente!');
        }

        $pizza = PizzaRepository::updatePizza($id,$newName,$newPrice,$newDescription);    
        
        $request->session()->flash('message', 'Alteração realizada com sucesso!');

        return;

    }

    public function getfilterSearchPizza(Request $request): ?Collection
    {
        return PizzaRepository::getFilter($request);
        
    }
}
