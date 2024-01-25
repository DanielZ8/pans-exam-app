@extends('layouts.app')

@section('content')
<div class="pytania-main-container">
    <div class="pytania-bar">
        <h5 class="h5" style="text-align: center">Edytuj pytanie</h5>
    </div>
    <div class="pytania-wrapper">
        <div class="pytanie-edit-wrapper-h">
            @if (Str::startsWith($pytanie->pytanie_tresc, '<h6>'))
                <h6 class="h5">{{ $pytanie->numer_pytania }}.&nbsp;</h6>{!! $pytanie->pytanie_tresc !!}
            @else
                <h6 class="h5 pytanie-tresc">{{ $pytanie->numer_pytania }}. {{ $pytanie->pytanie_tresc}}</h6>
            @endif<i class="pytanie-edit-pen icon-pen-fill pen-color"></i>
        </div>
        <form class="pytania-form" action="{{ route('pytanie-edit', $pytanie->id)}}" method="post" >
            @csrf
            <input type="hidden" name="pytanie_id" value="{{$pytanie->id}}">

            <div class="pytanie-input-label pytanie-tresc-hide" id="scroll1">
                <label class="pytanie-form-label h5" for="pytanie">Pytanie treść edycja</label>
                <textarea type="text" name="pytanie_tresc" id="pytanie_tresc_edit" disabled> 
                    @if(Str::startsWith($pytanie->pytanie_tresc, '<h6')){!! $pytanie->pytanie_tresc !!} 
                    @else<h6>{!! $pytanie->pytanie_tresc !!}</h6>
                    @endif
                </textarea>
            </div>

            <div class="pytanie-input-label" id="scroll2">
                <div><label class="pytanie-form-label h5" for="odp_krotka">Odpowiedź krótka</label><i class="pytanie-edit-k-pen icon-pen-fill pen-color"></i></div>
                <div class="pytanie-odp-k-hide">
                    <textarea class="textarea pytanie-odp-k-hide" name="odp_krotka" id="pytanie-odp-k" disabled>{!! $pytanie->odp_krotka !!}</textarea>
                </div>
            </div>

            <div class="pytanie-input-label" id="scroll3">
            <div><label class="pytanie-form-label h5"  for="odp_dluga">Odpowiedź długa</label><i class="pytanie-edit-d-pen icon-pen-fill pen-color"></i></div>
                <div class="pytanie-odp-d-hide">
                    <textarea class="textarea" name="odp_dluga" id="pytanie-odp-d" disabled>{!! $pytanie->odp_rozbudowana !!}</textarea>
                </div>
            </div>

            <button type="submit" class="button-dark">Zatwierdź</button>
        </form>
    </div>
</div>
@push('js_main')
        {{asset('js/edit.js')}}
    @endpush
@endsection