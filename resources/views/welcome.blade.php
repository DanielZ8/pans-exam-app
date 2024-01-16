@extends('layouts.app')

@section('content')
<div class="welcome-main-container">
    <div class="welcome-header-container">
        <img class= "welcome-hero-img" src="{{asset('img/welcome.jpg')}}" alt="">
        <div class="welcome-hero-filter">
            <h1 class="h1 welcome-hero-h">PANS Egzamin 2024 - Informatyka</h1>
        </div>
    </div>
    <div class="welcome-select-wrapper">
        <a class="welcome-select w-option-left" href="#">
            <img class= "welcome-select-img" src="{{asset('img/pytania.jpg')}}" alt="">
            <div class="welcome-select-filter">
                <h3 class="h2 welcome-select-h">Lista pytań</h3>
            </div>
        </a>
        <a class="welcome-select w-option-right" href="#">
            <img class= "welcome-select-img" src="{{asset('img/egzamin.jpg')}}" alt="">
            <div class="welcome-select-filter">
                <h3 class="h2 welcome-select-h">Symulacja egzaminu</h3>
            </div>
        </a>
    </div>
</div>
@endsection