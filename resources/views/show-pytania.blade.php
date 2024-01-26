@extends('layouts.app')

@section('content')
<div class="pytania-main-container">
    <div class="pytania-bar">
        <div class="pytania-select-category">
            <label for="category">Wybierz kategorię</label>
            <select name="category" id="category" class="input-select">
                <option value="all">Wszystko</option>
                @foreach ($kategorie as $kategoria)
                    <option value="{{$kategoria->id}}">{{$kategoria->nazwa}}</option>
                @endforeach
            </select>
        </div>
        <div class="pytania-legend">
            <div class="pytania-legend-item"><i class="icon-stickies-fill pytania-legend-item-i-sz "></i><p>Odpowiedź rozbudowana</p></div>
            <div class="pytania-legend-item"><i class="icon-sticky pytania-legend-item-i-k"></i><p>Odpowiedź krótka</p></div>
            <div class="pytania-legend-item"><i class="icon-stickies-fill pytania-legend-item-i-sz error-font "></i><p>Brak odp. rozbudowanej</p></div>
            <div class="pytania-legend-item"><i class="icon-sticky pytania-legend-item-i-k error-font"></i><p>Brak odp. krótkiej</p></div>
            <div class="pytania-legend-item"><i class="icon-x-lg pytania-legend-item-i-b"></i><p>Brak dwóch odpowiedzi</p></div>
        </div>   
        <div class="stats">
            <p>Stan:</p>
            <div class="licznik-item"><i class="icon-stickies-fill pytania-legend-item-i-sz"></i><p>{{$odp_roz}}/{{$pytania_ilosc}}</p></div>
            <div class="licznik-item"><i class="icon-sticky pytania-legend-item-i-k"></i><p>{{$odp_k}}/{{$pytania_ilosc}}</p></div>
            <div class="licznik-item"><i class="icon-stickies-fill pytania-legend-item-i-sz error-font"></i><p>{{$odp_roz_b}}/{{$pytania_ilosc}}</p></div>
            <div class="licznik-item"><i class="icon-sticky pytania-legend-item-i-k error-font"></i><p>{{$odp_k_b}}/{{$pytania_ilosc}}</p></div>
                <div class="licznik-item"><i class="icon-x-lg pytania-legend-item-i-b"></i><p>{{$odp_brak}}/{{$pytania_ilosc}}</p></div>
        </div>
    </div>
    <div class="pytania-wrapper">
        @foreach ($kategorie as $kategoria)
            <div class="category-item" id="{{ $kategoria->lp }}">
                <div class="category-item-h-wrapper" onclick="show_cat('{{ $kategoria->id }}')">
                    <h1 class="h5 category-item-h">{{ $kategoria->lp }}.  {{$kategoria->nazwa}}</h1><i class="icon-chevron-down icon-category {{'ic'.$kategoria->id }}"></i>
                </div>
                <div class="pytanie-collection {{'c'.$kategoria->id }}" id="{{ $kategoria->lp }}">
                    @foreach($pytania as $pytanie)
                        @if($pytanie->kategorie_id == $kategoria->id)
                            <div class="category-pytanie-item @if($pytanie->odp_krotka ==null && $pytanie->odp_rozbudowana ==null) bg-red @endif">
                                <div class="pytanie-tresc-wrapper">
                                    {{-- @if (Str::startsWith($pytanie->pytanie_tresc, '<h6'))
                                    <h6 class="h6 pytanie-tresc">{{ $pytanie->numer_pytania }}. {!! str_replace(['<h6>', '</h6>', '<h6'], ['', '', ''], $pytanie->pytanie_tresc) !!}</h6>
                                    @else --}}
                                    @if (Str::startsWith($pytanie->pytanie_tresc, '<h6'))
                                        <h6 class="h6 pytanie-tresc">{{ $pytanie->numer_pytania }}.&nbsp;</h6>{!! $pytanie->pytanie_tresc !!}
                                    @else
                                    <h6 class="h6 pytanie-tresc">{{ $pytanie->numer_pytania }}. {{ $pytanie->pytanie_tresc}}</h6>
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
                                        <a href="{{route('pytanie-edit', $pytanie->id)}}" target="_blank"><i class="icon-pen-fill pen-color"></i></a>
                                    @endauth
                                </div>
                                @if($pytanie->zdj_pytanie != null)
                                <div><img class="pytanie_img" src="{{asset($pytanie->zdj_pytanie)}}" alt=""></div>
                                @endif
                                <div class="odpowiedz-dluga {{'d'.$pytanie->id}}">
                                    <h6 class="h6 odp-d-h">Odpowiedź rozbudowana</h6> <br>
                                    @if( $pytanie->odp_rozbudowana !=null)
                                    {!! $pytanie->odp_rozbudowana !!}
                                    @endif
                                </div>
                                <div class="odpowiedz-krotka {{'k'.$pytanie->id}}">
                                    <h6 class="h6 odp-k-h">Odpowiedź krótka</h6> <br>
                                    @if( $pytanie->odp_krotka !=null)
                                    {!! $pytanie->odp_krotka !!}
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    @push('js_main')
        {{asset('js/main.js')}}
    @endpush
</div>
@endsection