<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam-App</title>
    @stack('css')
    @stack('js')
    @vite(['resources/css/app.css', 
    'resources/js/app.js', ])
</head>
<body>
    @yield('content')
</body>