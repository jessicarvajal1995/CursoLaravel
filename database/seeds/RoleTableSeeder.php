<?php

use Illuminate\Database\Seeder;
//para trabajar con un modelo lo incluimos
use LaraDex\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * creacion de un nuevo rol
     * le almaceno informacion por defecto a la BDD.
     */
    public function run()
    {
        $role = new Role();
        $role->name = "admin";
        $role->description = "Administrador";
        $role->save();

        $role = new Role();
        $role->name = "user";
        $role->description = "User";
        $role->save();
    }
}
