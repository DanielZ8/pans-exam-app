@extends('layouts.app')

@section('content')
<div class="welcome-main-container">
    <div class="welcome-header-container">
        <img class= "welcome-hero-img" src="{{asset('img/welcome.jpg')}}" alt="">
        <div class="welcome-hero-filter">
            <h1 class="h2 welcome-hero-h">PANS Egzamin 2024 - Informatyka</h1>
        </div>
    </div>
    <div class="welcome-select-wrapper">
        <a class="welcome-select w-option-left" href="{{route('pytania')}}">
            <img class= "welcome-select-img" src="{{asset('img/pytania.jpg')}}" alt="">
            <div class="welcome-select-filter">
                <h3 class="h3 welcome-select-h">Lista pytań</h3>
            </div>
        </a>
        <a class="welcome-select w-option-right" href="{{route('egzamin-test')}}">
            <img class= "welcome-select-img" src="{{asset('img/egzamin.jpg')}}" alt="">
            <div class="welcome-select-filter">
                <h3 class="h3 welcome-select-h">Egzamin testowy</h3>
            </div>
        </a>
    </div>
</div>
@endsection