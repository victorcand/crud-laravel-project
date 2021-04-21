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
            @if ($messageInfo)
                <div class="alert alert-info text-center">
                    {{ $messageInfo }}
                </div>
            @endif
        </div>
        <div class="conteudo-home">

            @foreach ($pizzas as $pizza)
                <div class="card">
                    <div class="card-home">

                        <span class="fs-8" id="name-pizza-{{ $pizza->id }}">
                            <h2 class=" text-center">Pizza</h2>
                            <p>{{ $pizza->pizza_name }}</p>

                            <h2>Preço</h2>
                            <p>{{ 'R$ ' . number_format($pizza->pizza_price, 2, ',', '.') }}</p>

                            <h2>Descrição da pizza</h2>
                            <p>{{ $pizza->pizza_description }}</p>
                        </span>

                    </div>

                    <div class="  w-75" hidden id="input-name-pizza-{{ $pizza->id }}">
                        <h2 class=" fs-3 text-center">Editar Dados</h2>
                        <h4>Pizza</h4>
                        <input type="text" class="form-control" id="name" value="{{ $pizza->pizza_name }}">
                        <h4>Preço</h4>
                        <input type="number" step="0.01" class="form-control" id="price" value="{{ $pizza->pizza_price }}">
                        <h4>Descrição</h4>
                        <textarea class="form-control" cols="30" id="description" rows="2">{{ $pizza->pizza_description }}</textarea>
                        <div class="input-group-append">
                            <button class="btn btn-success my-3" onclick="editPizza({{ $pizza->id }})">
                                <i class="fas fa-check"></i>
                            </button>
                            @csrf
                        </div>
                    </div>

                    <div class="btn-row">

                        <button class="btn btn-primary mx-3 my-3" onclick="toggleInput({{ $pizza->id }})">
                            <i class="fas fa-edit"></i>
                        </button>

                        <form method="POST" action="/pizzaria/{{ $pizza->id }}"
                            onsubmit="return confirm('Tem certeza que deseja excluir a pizza {{ addslashes($pizza->pizza_name) }}?')">
                            @csrf
                            @method('DELETE')

                            <div>
                                
                                <button class="btn btn-danger mx-3"><i class="far fa-trash-alt"></i></button>
                                        
                            </div>

                        </form>
                    </div>

                </div>

            @endforeach

        </div>
    </section>
@endsection
