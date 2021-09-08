<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <!--fonte-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> 

        <!--bootstrap-->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        
        <!--icons-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <!--css da aplicaçao-->
        <link rel="stylesheet" href="/css/style.css">

    
        <script src="/js/script.js"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <header>
        <nav class="navbar navbar-expand navbar-dark">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/1.png" alt="HDC Events" height="40">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/events/evento" class="nav-link">eventos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/events/create" class="nav-link">criar eventos</a>
                        </li>
                        <!--
                            <li class="nav-item">
                            <a href="/produto" class="nav-link">produto</a>
                            </li>
                            <li class="nav-item">
                                <a href="/produto_test" class="nav-link">produto test</a>
                            </li>
                        -->
                        @auth
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link">meus eventos</a>
                            </li>
                            <li class="nav-item">
                                <form action="/logout" method="POST">
                                    @csrf
                                        <a href="/logout"
                                        class="nav-link"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                            sair
                                        </a>
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a href="/login" class="nav-link">logar</a>
                            </li>
                            <li class="nav-item form-inline mt-2 mt-md-0">
                                <a href="/register" class="nav-link">cadastrar</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="row">
                @if(session('msg'))
                    <p class="msg">{{session('msg')}}</p>
                @endif
                @yield('content')
            </div>
        </main>
        <footer>
            <p>HDC Events &copy; 2020</p>
        </footer>
    </body>
</html>
