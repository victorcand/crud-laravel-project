<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/21acc6edcc.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>

<body>
    <header class="cabecalho">

        <div class="nav-bar">
            <img src="{{ asset('midia/logo-pizzaria-vera.png') }}">

            <div class="nav-right">
                <div class="nav-btn">

                    <a href="{{ route('list_pizzas') }}" class="btn-nav btn-info">Lista de Pizzas</a>
                    <a href="{{ route('form_pizza') }}" class="btn-nav btn-info">Cadastrar Pizza</a>

                </div>
                <div class="nav-search">

                    <form action="#" method="get">
                        <div class="search">
                            <input type="text" name="search">
                            <button class="btn-search">Buscar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </header>

    <main class="principal">

        @yield('conteudo')

    </main>

    <footer class="rodape">
        <p>Desenvolvido por Victor {{ date('Y') }}</p>
    </footer>
</body>

</html>
