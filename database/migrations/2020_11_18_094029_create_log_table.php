<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('description');

            $table->foreignId('materiel_id')->nullable()->constrained('materiel');
            $table->foreignId('salle_id')->nullable()->constrained('salle');
            
            $table->unsignedBigInteger('users_email');
            $table->foreign('users_email')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log');
    }
}
