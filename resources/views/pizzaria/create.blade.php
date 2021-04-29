@extends('layout')

@section('title') Cadastro de Pizzas @endsection

@section('conteudo')

    <section class="conteudo-form">


        <div class="card-form">

            @if (!empty($message))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </div>
            @endif

            <h4 class="fw-bolder text-uppercase ">Cadastro de Pizza</h4>
            <form method="post">
                @csrf

                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="pizza_name" id="floatingInput" placeholder="Nome">
                    <label for="floatingInput">Nome</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="number" step="0.01" name="pizza_price" class="form-control" id="floatingPassword"
                        placeholder="Preço">
                    <label for="floatingPassword">Preço</label>
                </div>

                <div class="form-floating mb-4">
                    <textarea class="form-control" cols="30" name="pizza_description"
                    placeholder="Descreva" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Descrição</label>
                </div>

                <div class="row">
                    <a href="{{ route('list_pizzas') }}" class="btn btn-success mb-3">Voltar</a>
                    <button class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>

    </section>

@endsection
