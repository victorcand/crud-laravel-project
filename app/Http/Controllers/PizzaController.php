<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzasFormRequest;
use App\Repositories\PizzaRepository;
use App\Service\PizzaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
        $pizzas = PizzaRepository::validateIfHasPizzaInDatabase($request);
        
        $mensagemDelete = $request->session()->get('mensagemDelete');
        $mensagemInfo = $request->session()->get('mensagemInfo');

        return View::make('pizzaria/home', compact('pizzas','mensagemDelete','mensagemInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');

        $mensagemErro = $request->session()->get('mensagemErro');

        return View::make('pizzaria/create', compact('mensagem','mensagemErro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzasFormRequest $request)
    {
        PizzaRepository::createPizza($request);

        return redirect('pizzaria/create');
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
    public function edit($id)
    {
        return "edit";
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
        DB::table('pizzas')->where('id',$request->id)->delete();

        $request->session()
            ->flash('mensagemDelete','Pizza excluída com sucesso!');
    

        return redirect('/pizzaria');
        
    }
}
