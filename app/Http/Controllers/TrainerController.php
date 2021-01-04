<?php

namespace LaraDex\Http\Controllers;

use Illuminate\Http\Request;
use LaraDex\Trainer;
use Illuminate\Support\Facades\Storage;
use LaraDex\Http\Requests\StoreTrainerRequest;

class TrainerController extends Controller
{
    
    public function index(Request $request)
    {
        //$request->user()->authorizeRoles(['user']);  VER LUEGO

        $trainers = Trainer::all(); //all consulta todos los trainer disponible
        return view('trainers.index', compact('trainers')); //compact genera un array con la variable que le asignemos
    }

    
    public function create()
    {
        return view('trainers.create');
    }

    
    public function store(StoreTrainerRequest $request)
    { 
        //logica que almacena mi dato en la BDD
        $trainer = new Trainer();

        if($request->hasFile('avatar')){ // if para preguntar al request si el contiene un archivo
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName(); //con esta linea me aseguro que el nombre de la carpeta no se va a repetir // asi se almacena el avatar en un archivo
            $file->move(public_path().'/images', $name); // mueve el archivo a una carpeta
        }

        $trainer->name = $request->input('name');
        $trainer->avatar = $name; // le asigno el avatar que subi, para que lo almacene en la BDD
        $trainer->description = $request->description; // otra manera de almacenar mas easy
        $trainer->slug = $request->input('name').time();
        $trainer->save();

        return redirect()->route('trainers.index')->with('status','Entrenador 
        creado correctamente'); 

        //return $request->input('name'); // metodo para ver un dato en especifico
        //return $request->all(); metodo para obtener o ver todos los datos que nos da el usuario
    }

    
    //public function show(Trainer $Trainer) //(Trainer $trainer) implicit building
    //{
        //$trainer = Trainer::find($id);  //implicit binding
    //    return view('trainers.show', compact('trainer'));
        //return view('trainers.show', ['trainer' => Trainer::findOrFail($id)]); // Otra manera de acceder a su informacion
    //}

    public function show(Trainer $trainer){
        return view('trainers.show', compact('trainer'));
        //return view('trainers.show', ['trainer' => Trainer::findOrFail($id)]); // Otra manera de acceder a su informacion
    }

    
    public function edit(Trainer $trainer) // como trabajamos con slug podemos usar el implicit binding
    {
        return view('trainers.edit', compact('trainer'));
        //return $trainer;  //para ver que me retorna la ruta 
    }

    public function update(Request $request, Trainer $trainer) // en el update tb se implementa el implicit binding
    {
        $trainer->fill($request->except('avatar')); //except('avatar') para tratar diferente la imagen // fill() se encarga de actualizar todos los datos que estamos recibiendo
        if($request->hasFile('avatar')){ 
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName(); 
            $trainer->avatar = $name; // actualizar el path que tenemos en la bdd, le asigna el new nombre
            $file->move(public_path().'/images', $name); 
        }
       
        $trainer->save(); // guardar todos los cambios
        return redirect()->route('trainers.show', [$trainer])->with('status','Entrenador 
        actualizado correctamente');



        //return $request;
        //return $trainer;
    }

    
    public function destroy(Trainer $trainer)
    {
        //eliminar archivos de laravel
        $file_path = public_path().'/images/'.$trainer->avatar;
        \File::delete($file_path);

        $trainer->delete();

        return redirect()->route('trainers.index')->with('status','Entrenador 
        eliminado correctamente');
    }
}
