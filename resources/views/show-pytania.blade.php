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
            <div class="pytania-legend">
                <i class="icon-sticky"></i>
                <i class="icon-stickies"></i>
                <i class="icon-x"></i>
            </div>
        </div>
    </div>
    <div class="pytania-wrapper">
        @foreach ($kategorie as $kategoria)
            <div class="category-item">
                <div class="category-item-h-wrapper">
                    <h1>{{$kategoria->nazwa}}</h1>
                </div>
                <div class="pytanie-collection" id="{{ $kategoria->lp }}">
                    @foreach($pytania as $pytanie)
                        @if($pytanie->kategorie_id == $kategoria->id)
                            <div class="category-pytanie-item">
                                <div class="pytanie-tresc-wrapper">
                                    <p class="pytanie-tresc">{{ $pytanie->numer_pytania}} {{ $pytanie->pytanie_tresc}}</p>
                                    <i class="icon-stickies"></i>
                                    <i class="icon-sticky"></i>
                                </div>
                                <div class="odpowiedz-dluga">

                                </div>
                                <div class="odpowiedz krotka">
                                    
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