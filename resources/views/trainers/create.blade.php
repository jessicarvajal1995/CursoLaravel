@extends('layouts.app')
@section('title', 'Trainers Create')
@section('content')
   
    @include('common.errors')
    
     <form class="form-group" method="POST" action="/trainers" enctype="multipart/form-data"> {{--el atributo enctype="multipart/form-data" permite subir archivos y enviarlos a la BDD--}}
        @csrf {{--SOLO USUARIOS AUTENTICADOS PUEDEN CREAR TRAINERS--}}
        <div class="form-group">
            <label for="">Nombre: </label>
            <input type="text" name="name" class="form-control">
        </div>

         <div class="form-group">
            <label for="">description: </label>
            <input type="text" name="description" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="">Avatar: </label>
            <input type="file" name="avatar" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form> 
    
    
    
@endsection


