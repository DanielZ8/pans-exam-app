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
    'resources/css/fontello.css'
/*     'node_modules/tinymce/skins/content/default/content.css' */])
</head>
<body>
    <div class="main-container">
        <div class="empty"></div>
        <header class="nav">
            <a href="{{ url('/') }}" class="nav-left">
                <h5><i class=" icon-laptop nav-ico"></i></h5>
                <h5 class="nav-left-text">APP - Egzamin 2024</h5>
            </a>
            <div class="nav-center">
                <a href="{{route('pytania')}}"  class="nav-link">Lista pytań</a>
                <a href="{{route('egzamin-test')}}"  class="nav-link">Egzamin testowy</a>
            </div>
            <div class="nav-right">
                -
                @auth
                <a href="{{route('logout')}}"><button class="button-dark button-logout red ">Wyloguj</button></a>
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