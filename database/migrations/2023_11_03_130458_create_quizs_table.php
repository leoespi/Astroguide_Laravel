<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizs', function (Blueprint $table) {
            
            $table->id();
            $table->text('Titulo');
            $table->integer('Duracion');
            $table->text('Pregunta');
            $table->text('RespuestaCorrecta');
            $table->text('Respuesta2');
            $table->text('Respuesta3');
            $table->text('Respuesta4');
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
        Schema::dropIfExists('quizs');
    }
}
