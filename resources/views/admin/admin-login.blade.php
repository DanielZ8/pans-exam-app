@extends('layouts.app')
@push('css')
    @vite(['resources/css/admin.css'])
@endpush
@section('content')
<div class="admin-login-container">
    <form class="admin-login-box" action="{{ route('admin-login')}}" method="post">
        <h3 class="h3 white">Logowanie</h3>
            @csrf
            @if(session('status'))
            <div class="error-alert">
                {{session('status')}}
            </div>
            @endif
            @error('Login')
                <div class="error-alert">
                    {{$message}}
                </div>
            @enderror
            <input type="text" class="input" placeholder="Login" name="Login">
            @error('Haslo')
                <div class="error-alert">
                    {{$message}}
                </div>
            @enderror
            <input type="password" class="input" placeholder="Hasło" name="Haslo">
            <button type="submit" class="button-dark login-button">Zaloguj</button>
     
    </form>
</div>
@endsection