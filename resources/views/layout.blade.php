<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body>
    <header class="cabecalho">

        <div class="nav-bar">
            <img src="{{ asset('midia/logo-pizzaria.png') }}">

            <div class="nav-right">
                <div class="nav-btn">

                    <a href="/pizzaria" class="btn-nav btn-info">Home</a>
                    <a href="/pizzaria/criar" class="btn-nav btn-info">Cadastrar Pizza</a>

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
