<?php

namespace LaraDex;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * metodo que devuelve resultado de la relacion
     * metodo: belongsToMany() es para relacion uno a muchos
     */
    public function roles(){
        return $this->belongsToMany('LaraDex\Role'); // recibe el modelo
    }

    // AUTORIZAR ROLES
    public function authorizeRoles($roles){
        if($this->hasAnyRole($roles)){
            return true;
        }
        abort(401, 'This action is unauthorized');
    }

    // VALIDA SI TIENE UN ARRAY DE ROLES.
    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)){
                return true;
            }
        }

        return false;
    }

    // VALIDA SI MI USUARIO TIENE ESE ROL
    public function hasRole($role){
        if($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
    }

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
