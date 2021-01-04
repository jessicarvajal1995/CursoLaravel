@extends('layouts.app')

@section('title', 'Trainer')

@section('content')
    
    @include('common.success')

    <img style="Width: 50px; background-color: #EFEFEF; margin: 20px;" class="card-img-top 
    rounded-circle mx-auto d-block" src="/../../../images/{{$trainer->avatar}}" alt="">
    <h5 class="text-center">{{$trainer->name}}</h5>
    <div class="text-center">
        <p>{{$trainer->description}}</p>
        <a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>
        
        <form class="form-group" method="POST" action="/trainers/{{$trainer->slug}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
    <div class="container text-center top-space">
        <modal-button></modal-button>
    </div>
    <create-form-pokemon></create-form-pokemon> 
@endsection