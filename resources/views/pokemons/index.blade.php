@extends('layouts.app')
    @section('content')
        <div class="container text-center top-space">
            <modal-button></modal-button>
        </div>
        <list-of-pokemons></list-of-pokemons>
        <create-form-pokemon></create-form-pokemon> {{--etiqueta que se crean en la carpera app.js 'components' --}}
        
        
    @endsection