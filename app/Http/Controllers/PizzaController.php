<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaRequest;
use App\Models\Pizzas;
use App\Service\PizzaService;
use Illuminate\Http\Request;
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

        $messageDelete = $request->session()->get('mensagemDelete');
        $messageInfo = $request->session()->get('mensagemInfo');

        return View::make('pizzaria/home', compact('pizzas', 'messageDelete', 'messageInfo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $message = $request->session()->get('mensagem');

        $messageErro = $request->session()->get('mensagemErro');

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";

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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "update";

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
