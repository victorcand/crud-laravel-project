<?php

namespace App\Service;

use App\Models\Pizzas;
use App\Repositories\PizzaRepository;

class PizzaService
{

    public static function validatePizzaFields($request)
    {
        $request->validate([
            'pizza_name' => 'required|min:3',
            'pizza_price' => 'required|min:2',
            'pizza_description' => 'required|min:3'
        ]);

        return PizzaRepository::createPizza($request);

    }

}
