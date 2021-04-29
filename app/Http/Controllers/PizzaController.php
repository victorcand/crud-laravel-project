<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaRequest;
use App\Models\Pizzas;
use App\Service\PizzaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $pizzasDatabase = new PizzaService();
        $pizzas = $pizzasDatabase->getListPizzas($request);
        
        $messageDelete = $request->session()->get('messageDelete');
        $messageInfo = $request->session()->get('messageInfo');
        
        return View::make('pizzaria/home', compact('pizzas', 'messageDelete', 'messageInfo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $message = $request->session()->get('message');

        $messageErro = $request->session()->get('messageErro');

        return View::make('pizzaria/create', compact('message', 'messageErro'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaRequest $request)
    {
        $pizza = new PizzaService();
        $pizza->createPizzaByForm($request);

        return redirect()->route('create_pizza');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $pizzas = new PizzaService();
        $pizzas->editPizzaInDatabase($request);

        return redirect()->route('list_pizzas');
    }

    /**
     * Filter bar
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $pizzasFilter = new PizzaService();
        
        $pizzas = $pizzasFilter->getfilterSearchPizza($request);

        return View::make('pizzaria/home', compact('pizzas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deletePizza = new PizzaService();
        $deletePizza->deletePizzaInListPizzas($request);

        return redirect()->route('list_pizzas');

    }
}
