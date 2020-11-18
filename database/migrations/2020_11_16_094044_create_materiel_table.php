<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterielTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiel', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('categorie');
            $table->tinyInteger('etat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

    Schema::dropIfExists('materiel');
    
    }
}
