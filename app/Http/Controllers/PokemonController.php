<?php

namespace LaraDex\Http\Controllers;
use LaraDex\Pokemon;

use Illuminate\Http\Request;

class PokemonController extends Controller
{
    //lista todos mis pokemon
    public function index(Request $request){
    //validacion (pregunta si mi $request esta realizando peticion
    //desde ajax(), de ser asi haremos otra cosa.
    if($request->ajax()){
        $pokemons = Pokemon::all();
        //retornaremos una respuesta fake, mientras.
        //tipo json, con un array de pokemones.a1
        return response()->json($pokemons, 200);
    }

        return view('pokemons.index');
    }
    
    // PARA ALMACENAR   
    public function store(Request $request){
        if($request->ajax()){

            $pokemon = new Pokemon();
            $pokemon->name = $request->input('name');
            $pokemon->description = $request->input('description');
            $pokemon->picture = $request->input('picture');
            $pokemon->save();

            return response()->json([
                "message" => "Pokemon creado correctamente",
                "pokemon" => $pokemon   
            ], 200);
        }
    }
}
