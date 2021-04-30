@extends('layout')

@section('title') @if (isset($pizza))Editar Pizza @else Cadastro de Pizzas
@endif


@endsection

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

        <h4 class="fs-4 fw-light text-uppercase ">
            @if (isset($pizza))Editar Pizza @else Cadastro de Pizza @endif
        </h4>

        @if (isset($pizza))
            <form method="POST" action="/pizzaria/{{ $pizza->id }}">
                @method('PUT')
        @else
            <form method="post">
        @endif
        @csrf

        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="pizza_name" id="floatingInput" placeholder="Nome"
                value="{{ $pizza->pizza_name ?? '' }}">
            <label for="floatingInput">Nome</label>
        </div>
        <div class="form-floating mb-2">
            <input type="number" step="0.01" name="pizza_price" class="form-control" id="floatingPassword"
                placeholder="Preço" value="{{ $pizza->pizza_price ?? '' }}">
            <label for="floatingPassword">Preço</label>
        </div>

        <div class="form-floating mb-4">
            <textarea class="form-control" cols="30" name="pizza_description" placeholder="Descreva"
                id="floatingTextarea">{{ $pizza->pizza_description ?? '' }}</textarea>
            <label for="floatingTextarea">Descrição</label>
        </div>

        <div class="row">
            <a href="{{ route('list_pizzas') }}" class="btn btn-success mb-3">Voltar</a>
            <button class="btn btn-success">
                @if (isset($pizza))Editar Pizza @else Cadastrar @endif
            </button>
        </div>
        </form>
    </div>

</section>

@endsection
