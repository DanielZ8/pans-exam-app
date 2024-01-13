<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam-App</title>
    @stack('css')
    @stack('js')
    @vite(['resources/css/app.css', 
    'resources/js/app.js',
    'resources/css/global.css',
    'resources/css/fontello.css'])
</head>
<body>
    <div class="main-container">
        <div class="empty"></div>
        <header class="nav">
            <a href="#" class="nav-left">
                <h5><i class=" icon-laptop nav-ico"></i></h5>
                <h5 class="nav-left-text">Exam App</h5>
            </a>
            <div class="nav-center">
                <a href="#">Pytania (nauka)</a>
                <a href="#">Losowanie (egzamin)</a>
            </div>
            <div class="nav-right">
                -
                @auth
                <a href="{{route('logout')}}"><button class="button-dark button-logout">Wyloguj</button></a>
                @endauth
            </div>
        </header>
        <!-- CONTENT -->
        @yield('content')
        <footer>footer</footer>
    </div>
</body>