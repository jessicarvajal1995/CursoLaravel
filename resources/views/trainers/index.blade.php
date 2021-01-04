@extends('layouts.app')

@section('title', 'Trainers')

@section('content')
    
    @include('common.success')
    
    <div class="row">
        @foreach($trainers as $trainer) {{--recorre una lista de array (compact), y a cada recurso que itera lo nombra 'trainer' --}}
            {{-- <p>{{$trainer->name}}</p>  accede al nombre del trainer y lo muestra --}}
            <div class="col-sm"> {{--cuando tenga mas de 1 columna lo colapse--}}
                <div class="card text-center" style="width: 18rem; margin-top: 70px;">
                <img style="Height: 100px; Width: 100px; background-color: #EFEFEF; margin: 20px;" 
                class="card-img-top rounded-circle mx-auto d-block" src="images/{{$trainer->avatar}}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{$trainer->name}}</h5>
                    <p class="card-text">{{$trainer->description}}</p>
                    <a href="/trainers/{{$trainer->slug}}" class="btn btn-primary">Ver más</a>
                </div>
                </div>
             </div>
        @endforeach
    </div>
@endsection