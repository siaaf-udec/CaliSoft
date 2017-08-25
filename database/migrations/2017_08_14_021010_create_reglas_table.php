<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReglasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Reglas',function(Blueprint $table){
          $table->increments('PK_id');
          $table->integer('nota');
          $table->integer('FK_TipoNomenclaturaId')->unsigned();
          $table->integer('FK_ArchivoBdId')->unsigned();

          $table->foreign('FK_TipoNomenclaturaId')->references('PK_id')
          ->on('TBL_TipoNomenclatura')->onUpdate('cascade');

          $table->foreign('FK_ArchivoBdId')->references('PK_id')
          ->on('TBL_ArchivoBd')->onUpdate('cascade');

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
        Schema::dropIfExists('TBL_Reglas');
    }
}
