@extends('layout')

@section('title') CRUD Pizzas @endsection

@section('conteudo')

    <div class="msg-format">
        @if (!empty($mensagem))
            <div class="msg-success">
                {{ $mensagem }}
            </div>
        @endif
    </div>

    <section class="conteudo-home">

        @foreach ($pizzas as $pizza)

            <div class="card">
                <div class="form-control">

                    <h2>Pizza</h2>
                    <p>{{ $pizza->pizza_name }}</p>

                    <h2>Preço</h2>
                    <p>{{ 'R$ ' . number_format($pizza->pizza_price, 2, ',', '.') }}</p>

                    <h2>Descrição da pizza</h2>
                    <p>{{ $pizza->pizza_description }}</p>

                </div>
                <form method="POST" action="/pizzaria/{{ $pizza->id }}" onsubmit="return confirm(
                                'Tem certeza que deseja excluir a pizza {{ addslashes($pizza->pizza_name) }}?')">
                    @csrf
                    @method('DELETE')

                    <div class="form-row">
                        <button class="btn btn-danger">Excluir</button>
                    </div>

                </form>

            </div>

        @endforeach

    </section>

@endsection
