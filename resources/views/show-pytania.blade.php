@extends('layouts.app')

@section('content')
<div class="pytania-main-container">
    <div class="pytania-bar">
        <div class="pytania-select-category">
            <label for="category">Wybierz kategorię</label>
            <select name="category" id="category">
                <option value="Wszystko">Wszystko</option>
                @foreach ($kategorie as $kategoria)
                    <option value="{{$kategoria->nazwa}}">{{$kategoria->nazwa}}</option>
                @endforeach
            </select>
        </div>
        <div class="pytania-legend">
            <div class="pytania-legend-item"><i class="icon-stickies pytania-legend-item-i-sz "></i><p>Odpowiedź szczegółowa</p></div>
            <div class="pytania-legend-item"><i class="icon-sticky pytania-legend-item-i-k"></i><p>Odpowiedź krótka</p></div>
            <div class="pytania-legend-item"><i class="icon-x-lg pytania-legend-item-i-b"></i><p>Brak odpowiedzi</p></div>
            
            
        </div>   
    </div>
    <div class="pytania-wrapper">
        @foreach ($kategorie as $kategoria)
            <div class="category-item" id="{{ $kategoria->lp }}">
                <div class="category-item-h-wrapper">
                    <h1>{{$kategoria->nazwa}}</h1>
                </div>
                <div class="pytanie-collection" id="{{ $kategoria->lp }}">
                    @foreach($pytania as $pytanie)
                        @if($pytanie->kategorie_id == $kategoria->id)
                            <div class="category-pytanie-item">
                                <div class="pytanie-tresc-wrapper">
                                    <p class="pytanie-tresc">{{ $pytanie->numer_pytania}}. {{ $pytanie->pytanie_tresc}}</p>
                                    <i class="icon-stickies pytania-legend-item-i-sz"></i>
                                    <i class="icon-sticky pytania-legend-item-i-k"></i>
                                    @auth
                                        <a href="{{route('pytanie-edit', $pytanie->id)}}"><i class="icon-pen"></i></a>
                                    @endauth
                                </div>
                                <div class="odpowiedz-dluga">
                                    @if( $pytanie->odp_rozbudowana !=null)
                                    {!! $pytanie->odp_rozbudowana !!}
                                    @endif
                                </div>
                                <div class="odpowiedz krotka">
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
    
</div>
@endsection