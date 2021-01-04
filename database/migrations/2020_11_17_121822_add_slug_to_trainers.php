<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToTrainers extends Migration
{
    
    public function up()
    {
        Schema::table('trainers', function (Blueprint $table) {
            $table->string('slug')->unique();  
        });
    }

    
    public function down()
    {
        Schema::table('trainers', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
