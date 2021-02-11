<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamps();
        });

        /* Va insérer automatiquement ces données dans la BDD */
        DB::table('roles')->insert(['nom' => 'Administrateur']);
        DB::table('roles')->insert(['nom' => 'Pilote']);
        DB::table('roles')->insert(['nom' => 'Intervenant']);
        DB::table('roles')->insert(['nom' => 'Apprenant']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
