<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaCodificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_NotaCodificacion', function (Blueprint $table) {
            $table->increments('PK_id');
            $table->string('nota');
            $table->integer('FK_ProyectoId')->unsigned();
            $table->integer('FK_ItemsId')->unsigned();

            $table->foreign('FK_ProyectoId')->references('PK_id')
            ->on('TBL_Proyectos')->onUpdate('cascade');

            $table->foreign('FK_ItemsId')->references('PK_id')
            ->on('TBL_ItemsCodificacion')->onUpdate('cascade');
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
        Schema::dropIfExists('TBL_NotaCodificacion');
    }
}
