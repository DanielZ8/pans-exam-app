@extends('layouts.app')
@push('css')
    @vite(['resources/css/admin.css'])
@endpush
@section('content')
<div class="admin-login-container">
    <form class="admin-login-box" action="{{ route('admin-password-change')}}" method="post">
        <h3 class="h3 white">Zmień hasło</h3>
            @csrf
            @if (\Session::has('error')) 
                <div class="error-alert">{!! \Session::get('error') !!}</div>   
            @endif
            @if (\Session::has('success')) 
                <div class="success-alert">{!! \Session::get('success') !!}</div>   
            @endif
            @error('old_password')
                <div class="error-alert">{{ $message }}</div>
            @enderror
            <input type="password" class="input" placeholder="Stare hasło" name="old_password">
            @error('password')
                <div class="error-alert">{{ $message }}</div>
            @enderror
            <input type="password" class="input" placeholder="Nowe hasło" name="password">
            <input type="password" class="input" placeholder="Powtórz nowe hasło" name="password_confirmation">
            <button type="submit" class="button-dark login-button">Zatwierdź</button>
     
    </form>
</div>
@endsection