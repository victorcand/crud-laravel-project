@extends('layout')

@section('title') CRUD Pizzas @endsection

@section('conteudo')

    <section class="section-conteudo">
        <div class="msg-format">
            @if (!empty($messageDelete))
                <div class="alert alert-success text-center">
                    {{ $messageDelete }}
                </div>
            @endif
        </div>

        <div class="msg-format">
            @if (!empty($message))
                <div class="alert alert-success text-center">
                    {{ $message }}
                </div>
            @endif
        </div>

        <div class="msg-format">
            @if ($messageInfo ?? '')
                <div class="alert alert-info text-center">
                    {{ $messageInfo ?? '' }}
                </div>
            @endif
        </div>


        <div class="conteudo-home" id="app">

            @foreach ($pizzas as $pizza)

                <div class="card border-info">
                    <div class="card-home">


                        <h2 class="fs-3 text-center card-header">Nome da Pizza</h2>
                        <div class="card-boddy text-secondary">
                            <p class="text-decoration-underline fs-4 fw-bolder text-uppercase card-text text-center">
                                {{ $pizza->pizza_name }}
                            </p>
                        </div>
                        <div class="card-boddy text-secondary">
                            <h4>Preço</h4>
                            <p class=" card-text">
                                {{ 'R$ ' . number_format($pizza->pizza_price, 2, ',', '.') }}
                            </p>
                        </div>
                        <div class="card-boddy text-secondary">
                            <h4>Descrição da pizza</h4>
                            <p class=" card-text">
                                {{ $pizza->pizza_description }}</p>
                        </div>

                        </span>

                    </div>

                    <div class="btn-row card-footer bg-transparent border-info">

                        <a href="{{ url("pizzaria/$pizza->id/edit") }}">
                            <button class="btn btn-primary mx-3">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>

                        <form method="POST" action="/pizzaria/{{ $pizza->id }}"
                            onsubmit="return confirm('Tem certeza que deseja excluir a pizza {{ addslashes($pizza->pizza_name) }}?')">
                            @method('DELETE')

                            @csrf

                            <div>
                                <button class="btn btn-danger "><i class="far fa-trash-alt"></i></button>
                            </div>

                        </form>
                    </div>

                </div>

            @endforeach

        </div>

    </section>
@endsection
