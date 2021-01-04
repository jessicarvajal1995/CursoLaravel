<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTrainerIdToPokemonTable extends Migration
{
    
    public function up()
    {
        Schema::table('pokemon', function (Blueprint $table) {
            $table->integer('trainer_id')->unsigned();  
        });
    }

   
    public function down()
    {
        Schema::table('trainers', function (Blueprint $table) {
            $table->dropColumn('trainer_id');  
        });
    }
}
