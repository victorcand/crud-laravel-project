@extends('layout')

@section('title') Cadastro de Pizzas @endsection

@section('conteudo')

    <section class="conteudo-form">


        <div class="card-form">

            @if (!empty($mensagem))
                <div class="msg-success">
                    {{ $mensagem }}
                </div>
            @endif
        
            @if ($errors->any())
                <div class="msg-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                           <p> {{ $error }} </p>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2>Cadastro de Pizza</h2>
            <form method="post" class="form-group">
                @csrf

                <div class="form-control">
                    <label for="pizza_name">Nome:</label>
                    <input type="text" name="pizza_name">
                </div>
                <div class="form-control">
                    <label for="pizza_price">Preço:</label>
                    <input type="number" step="0.1" name="pizza_price">
                </div>
                <div class="form-control">
                    <label for="pizza_description">Descrição:</label>
                    <textarea name="pizza_description" cols="30" rows="5"></textarea>
                </div>
                <div class="form-row">
                    <a href="/pizzaria" class="btn btn-success">Voltar</a>
                    <button class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>

    </section>

@endsection
