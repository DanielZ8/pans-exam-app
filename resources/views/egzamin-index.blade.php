@extends('layouts.app')

@section('content')
    <div class="pytania-main-container">
        <div class="pytania-bar">
            <h5 class="h5" style="text-align: center">Egzamin testowy</h5>
        </div>
        <div class="pytanie-collection2">
        <div id="timer">90:00</div>
        <div class="pytania-wrapper">
            @foreach($pytania as $pytanie)
                <div class="category-pytanie-item @if($pytanie->odp_krotka ==null && $pytanie->odp_rozbudowana ==null) bg-red @endif">
                    <h6 class="h6">{{$pytanie->kategorie->nazwa}} ({{$pytanie->typ_pytania}})</h6>
                    <div class="pytanie-tresc-wrapper">
                        @if (Str::startsWith($pytanie->pytanie_tresc, '<h6>'))
                        <h6 class="h5  pytanie-tresc">{{ $pytanie->numer_pytania }}. {!! str_replace(['<h6>', '</h6>'], ['', ''], $pytanie->pytanie_tresc) !!}</h6>
                        @else
                        <h6 class="h5 pytanie-tresc">{{ $pytanie->numer_pytania }}. {{ $pytanie->pytanie_tresc}}</h6>
                        @endif

                        <span class="item-i-mg-left"></span>
                        @if($pytanie->odp_rozbudowana !=null)
                            <i class="icon-stickies-fill pytania-legend-item-i-sz pytania-hover" onclick="show('{{'d'.$pytanie->id}}')"></i>
                        @endif

                        @if($pytanie->odp_krotka !=null)
                            <i class="icon-sticky pytania-legend-item-i-k pytania-hover" onclick="show('{{'k'.$pytanie->id}}')"></i>
                        @endif

                        @if($pytanie->odp_krotka ==null && $pytanie->odp_rozbudowana ==null)
                            <i class="icon-x-lg pytania-legend-item-i-b"></i>
                        @endif

                        @auth
                            <a href="{{route('pytanie-edit', $pytanie->id)}}"><i class="icon-pen-fill pen-color"></i></a>
                        @endauth
                    </div>
                    <div class="odpowiedz-dluga {{'d'.$pytanie->id}}">
                        <h6 class="h5 odp-d-h">Odpowiedź rozbudowana</h6> <br>
                        @if( $pytanie->odp_rozbudowana !=null)
                        {!! $pytanie->odp_rozbudowana !!}
                        @endif
                    </div>
                    <div class="odpowiedz-krotka {{'k'.$pytanie->id}}">
                        <h6 class="h5 odp-k-h">Odpowiedź krótka</h6> <br>
                        @if( $pytanie->odp_krotka !=null)
                        {!! $pytanie->odp_krotka !!}
                        @endif
                    </div>
                </div>
        
            @endforeach
        </div>
    </div>
    </div>
    @push('js_main')
        {{asset('js/egzamin.js')}}
    @endpush
@endsection