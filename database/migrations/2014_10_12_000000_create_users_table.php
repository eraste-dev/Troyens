<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nomComplet')->nullable();
            $table->string('raisonSocial')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('matricule')->nullable()->unique();
            $table->string('telephone')->nullable();
            $table->string('dateNaissance')->nullable();
            $table->string('genre')->nullable();
            $table->string('typeEleve')->nullable();
            $table->string('niveauEtude')->nullable();
            $table->string('serie')->nullable();
            $table->string('diplome')->nullable();
            $table->string('promotion')->nullable();
            $table->string('profession')->nullable();
            $table->string('lieuResidence')->nullable();
            $table->string('siege')->nullable();
            $table->string('adresse')->nullable();
            $table->string('site_web')->nullable();
            $table->string('role')->nullable();
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
