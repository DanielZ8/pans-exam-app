@extends('layouts.app')

@section('content')
<div class="pytania-main-container">
    <div class="pytania-bar">

    </div>
    <div class="pytania-wrapper">
        <form action="{{ route('pytanie-edit', $pytanie->id)}}" method="post" >
            @csrf
            <input type="hidden" name="pytanie_id" value="{{$pytanie->id}}">
        <label for="pytanie">Pytanie treść</label>
        <input type="text" name="pytanie_tresc" value="{{$pytanie->pytanie_tresc}}">

        <label for="odp_krotka">Odpowiedź krótka</label>
        <textarea name="odp_krotka">{!! $pytanie->odp_krotka !!}</textarea>

        <label for="odp_dluga">Odpowiedź długa</label>
        <textarea name="odp_dluga" id="editor">{!! $pytanie->odp_rozbudowana !!}</textarea>

        <button type="submit">Zatwierdź</button>
        </form>
    </div>
</div>
@endsection