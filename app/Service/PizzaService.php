<?php

namespace App\Service;

use App\Models\Pizzas;
use App\Repositories\PizzaRepository;
use Illuminate\Support\Collection;

class PizzaService
{

    public function getListPizzas($request): ?Collection
    {
        $pizzas = PizzaRepository::getListPizzasInDatabase();
    
        if(count($pizzas) == 0){
           $mensagemInfo = $request->session()->flash('mensagemInfo', 'Não há pizza cadastrada!');
        }
        
        return $pizzas;
        
    }

    public function createPizzaByForm($request): ?Pizzas
    {
        PizzaRepository::createPizza($request);
        return $request->session()->flash('mensagem', 'Cadastro realizado com sucesso!');
        
    }

    public function deletePizzaInListPizzas($request)
    {
        PizzaRepository::deletePizza($request);

        $request->session()
            ->flash('mensagemDelete','Pizza excluída com sucesso!');
    }

}
