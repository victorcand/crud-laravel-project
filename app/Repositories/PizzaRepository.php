<?php

namespace App\Repositories;

use App\Models\Pizzas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PizzaRepository
{
    public static function validatePizzaFields($request): ?Request
    {
        if (empty($request['pizza_name']) || empty($request['pizza_price']) || empty($request['pizza_description'])) {
            return $request->session()->flash('mensagemErro', 'Preencha os todos os campos!');
        }

        Pizzas::create($request->all());
        return $request->session()->flash('mensagem', 'Cadastro realizado com sucesso!');

    }

    public static function validateIfHasPizzaInDatabase($request)
    {
        $pizzas = DB::table('pizzas')->orderBy('id','desc')->get();

        if(count($pizzas) == 0){
           $mensagemInfo = $request->session()->flash('mensagemInfo', 'Não há pizza cadastrada!');
        }

        return $pizzas;
    }
}
