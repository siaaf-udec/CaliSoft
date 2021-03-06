<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Categorias', function (Blueprint $table) {
            $table->increments('PK_id');
            $table->string('nombre')->unique();
            $table->integer('plataforma');
            $table->integer('modelado');
            $table->integer('base_datos');
            $table->integer('codificacion');
            $table->text('descripcion');
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
        Schema::dropIfExists('TBL_Categorias');
    }
}
