<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foro', function (Blueprint $table) {
            $table->id();
            $table->string('Usuario');
            $table->text('Comentarios');
            $table->string('Codigo de publicacion');
            $table->string('Fecha');
            $table->string('Hora de publicacion');

        });
    }
//La vida es dura mi hermano

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foro');
    }
}
