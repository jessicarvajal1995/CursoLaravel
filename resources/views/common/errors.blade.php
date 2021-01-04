@if ($errors->any()) {{--Alertas en error de campos--}}
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
@endif