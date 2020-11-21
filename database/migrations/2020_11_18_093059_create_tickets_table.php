<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->dateTime('date');
            $table->dateTime('dateEcheance');
            $table->string('description');
            $table->tinyInteger('etat');
          
            $table->foreignId('materiels_id')->nullable()->constrained('materiels');
            $table->foreignId('salles_id')->nullable()->constrained('salles');

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}