<?php

namespace App\Repositories;

use App\Models\Pizzas;
use Illuminate\Support\Facades\DB;

class PizzaRepository
{
    public static function validatePizzaFields($request)
    {
        if (empty($request['pizza_name']) || empty($request['pizza_price']) || empty($request['pizza_description'])) {
            return $request->session()->flash('mensagemErro', 'Cadastro errado, preencha os dados!');
        }

        Pizzas::create($request->all());
        $request->session()->flash('mensagem', 'Cadastro realizado com sucesso!');

    }

    public static function validateIfHasPizzaInDatabase($request)
    {
        $pizzas = DB::table('pizzas')
        ->orderBy('id', 'desc')
        ->get();
        
        if(empty($pizzas)){
            $mensagem = $request->session()->get('mensagem');
            
        }
        
    }
}
