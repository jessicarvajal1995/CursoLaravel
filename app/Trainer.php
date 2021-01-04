<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
   
    protected $fillable = ['name','description','avatar']; //permite actualizar los campos, haciendole saber las variables que pienso actualizar.

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // RELACION UNO A MUCHOS
    // 1 trainers tiene muchos pokemons
    public function pokemons()
    {
        return $this->hasMany('LaraDex\Pokemon');
    }
} 
