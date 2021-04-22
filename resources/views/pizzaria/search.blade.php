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
            @if ($messageInfo ?? '')
                <div class="alert alert-info text-center">
                    {{ $messageInfo ?? '' }}
                </div>
            @endif
        </div>
        <div class="conteudo-home">

            @foreach ($pizzas as $pizza)

                <div class="card border-info">
                    <div class="card-home">

                        <span class="fs-6" id="name-pizza-{{ $pizza->id }}">

                            <h2 class="fs-3 text-center card-header">Nome da Pizza</h2>
                            <div class="card-boddy text-secondary" id="name-test-{{$pizza->pizza_name}}">
                                <p class="text-decoration-underline fs-4 fw-bolder text-uppercase card-text text-center">
                                    {{ $pizza->pizza_name }}
                                </p>
                            </div>
                            <div class="card-boddy text-secondary">
                                <h4>Preço</h4>
                                <p class=" card-text" id="price-{{ $pizza->pizza_price }}">
                                    {{ 'R$ ' . number_format($pizza->pizza_price, 2, ',', '.') }}
                                </p>
                            </div>
                            <div class="card-boddy text-secondary">
                                <h4>Descrição da pizza</h4>
                                <p class=" card-text" id="description-{{ $pizza->pizza_description }}">
                                    {{ $pizza->pizza_description }}</p>
                            </div>

                        </span>

                    </div>

                    <div class="card" hidden id="input-name-pizza-{{ $pizza->id }}">
                        <h2 class="fs-3 text-center card-header">Editar Dados</h2>
                        <div class="card-boddy text-secondary">
                            <h4>Pizza</h4>
                            <input type="text" class="form-control " id="name" value="{{ $pizza->pizza_name }}">
                        </div>
                        <div class="card-boddy text-secondary">
                            <h4>Preço</h4>
                            <input type="number" step="0.01" class="form-control card-text" id="price"
                                value="{{ $pizza->pizza_price }}">
                        </div>
                        <div class="card-boddy text-secondary">
                            <h4>Descrição</h4>
                            <textarea class="form-control card-text" cols="30" id="description"
                                rows="2">{{ $pizza->pizza_description }}</textarea>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-success mx-3 my-2" onclick="editPizza({{ $pizza->id }})">
                                <i class="fas fa-check"></i>
                            </button>
                            @csrf
                        </div>
                    </div>

                    <div class="btn-row card-footer bg-transparent border-info">

                        <button class="btn btn-primary mx-3" onclick="toggleInput({{ $pizza->id }})">
                            <i class="fas fa-edit"></i>
                        </button>

                        <form method="POST" action="/pizzaria/{{ $pizza->id }}"
                            onsubmit="return confirm('Tem certeza que deseja excluir a pizza {{ addslashes($pizza->pizza_name) }}?')">
                            @csrf
                            @method('DELETE')

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
