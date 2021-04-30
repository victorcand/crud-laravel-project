<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <title>@yield('title')</title>
</head>

<body>
    <header class="cabecalho">

        <div class="nav-bar">
            <img src="{{ asset('midia/logo-pizzaria-vera.png') }}">

            <div class="nav-right">
                <div class="nav-btn">

                    <a href="{{ route('list_pizzas') }}" class="btn btn-primary mx-2">Lista de Pizzas</a>
                    <a href="{{ route('form__create_pizza') }}" class="btn btn-primary">Cadastrar Pizza</a>

                </div>
                <div class="nav-search">

                    <form action="{{ route('filter_pizza') }}" method="get">
                        <div class="input-group">
                            <input type="search" class="form-control" name="search">
                            <span class="input-group-prepend">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </span>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </header>

    <section class="menu-lateral">

        <div class="list-group dashboard">
            <a href="{{ route('list_pizzas') }}" class="list-menu"
                aria-current="true">
                Lista de Pizzas
            </a>
            <a href="{{ route('form__create_pizza') }}" class="list-menu"
                aria-current="true">
                Cadastrar Pizza
            </a>
        </div>

    </section>

    <main class="principal">

        @yield('conteudo')

    </main>

    <footer class="rodape">
        <span>Desenvolvido por Victor {{date('Y')}}</span>
    </footer>
    <script src="https://kit.fontawesome.com/21acc6edcc.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
