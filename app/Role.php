<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //funcion que relacione user con role. 
    //metodo belongsToMany('modelo') : 1:N
    public function users(){
        return $this->belongsToMany('LaraDex\User');
    }
}
