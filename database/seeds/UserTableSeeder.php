<?php

use Illuminate\Database\Seeder;
//para trabajar con un modelo lo incluimos
use LaraDex\Role;
use LaraDex\User;

class UserTableSeeder extends Seeder
{
    /**
     *  Rol de usuario y user, le pedimos que nos traiga el primero que encuentre por nombre
     * y usuario.
     */
    public function run()
    {
        //Query para que traiga informacion de un rol
        $role_user = Role::where('name','user')->first();
        $role_admin = Role::where('name','admin')->first();

        //ahora se le asignan a un usuario.
        $user = new User();
        $user->name = "User";
        $user->email = "user@mail.com";
        $user->password = bcrypt('query'); //bcrypt() encriptar de laravel
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@mail.com";
        $user->password = bcrypt('query'); 
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
