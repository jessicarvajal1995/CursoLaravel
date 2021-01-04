<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('prueba', 'PruebaController@prueba');
/*
Route::get('/name/{name}/lastname/{lastname?}', function($name, $lastname = null){
    return 'Hola soy '.$name .' '. $lastname;
});

Route::get('/mi_primer_ruta', function(){
    return 'Hello word. esta es mi ruta';
});
*/

Route::resource('trainers', 'TrainerController');
//Route::resource('pokemons', 'PokemonController');
Route::post('trainers/{trainer}/pokemons','PokemonController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
