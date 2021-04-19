<?php

namespace App\Repositories;

use App\Models\Pizzas;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PizzaRepository
{
    

    public static function validateIfHasPizzaInDatabase($request): ?Collection
    {
        $pizzas = DB::table('pizzas')->orderBy('id','desc')->get();

        if(count($pizzas) == 0){
           $mensagemInfo = $request->session()->flash('mensagemInfo', 'Não há pizza cadastrada!');
        }

        return $pizzas;
    }

    public static function createPizza($request)
    {
        Pizzas::create($request->all());
        return $request->session()->flash('mensagem', 'Cadastro realizado com sucesso!');
    }
}
