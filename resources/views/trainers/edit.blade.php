@extends('layouts.app')
@section('title', 'Trainer Edit')
@section('content')
    <form class="form-group" method="POST" action="/trainers/{{$trainer->slug}}" enctype="multipart/form-data"> {{--el atributo enctype="multipart/form-data" permite subir archivos y enviarlos a la BDD--}}
        @method('PUT') {{--PERMITE OCULTAR EL ENVIO DE FORMULARIO--}} {{--TAMBIEN SE EDITA EL ACTION--}}
        @csrf {{--SOLO USUARIOS AUTENTICADOS PUEDEN CREAR TRAINERS--}}
        <img style="Height: 200px; Width: 200px; background-color: #EFEFEF; margin: 20px;" class="card-img-top 
    rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" alt="">
        
        <div class="form-group">
            <label for="">Nombre: </label>
            <input type="text" value="{{$trainer->name}}" name="name" class="form-control">
        </div>

         <div class="form-group">
            <label for="">description: </label>
            <input type="text" value="{{$trainer->description}}" name="description" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="">Avatar: </label>
            <input type="file" name="avatar" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form
    
@endsection


