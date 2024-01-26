<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PANS Egzamin 2024</title>
    @stack('css')
    @stack('js')
    @vite(['resources/css/app.css', 
    'resources/js/app.js',
    'resources/js/layout.js',
    'resources/css/global.css',
    'resources/css/fontello.css'
/*     'node_modules/tinymce/skins/content/default/content.css' */])
</head>
<body>
    <div class="main-container">
        <div class="empty"></div>
        <header class="nav">
            <a href="{{ url('/') }}" class="nav-left">
                <h5><i class=" icon-laptop nav-ico"></i></h5>
                <h5 class="nav-left-text">PANS-Egzamin 2024</h5>
            </a>
            <div class="nav-center">
                <a href="{{route('pytania')}}"  class="nav-link">Lista pytań</a>
                <a href="{{route('egzamin-test')}}"  class="nav-link">Egzamin testowy</a>
                @auth
                <a href="{{route('logout')}}"><button class="button-dark button-logout red hide-logout1">Wyloguj</button></a>
                @endauth
            </div>
            <div class="nav-right">
                <i class="icon-list hamburger"></i>
                @auth
                <a href="{{route('logout')}}"><button class="button-dark button-logout red hide-logout2">Wyloguj</button></a>
                @endauth
            </div>
        </header>
        <!-- CONTENT -->
        @yield('content')
        <footer>
            <p style="font-weight: 200;">© Daniel Ziółkowski</p>
        </footer>
    </div>

    <script src="@stack('js_main')"></script>
</body>