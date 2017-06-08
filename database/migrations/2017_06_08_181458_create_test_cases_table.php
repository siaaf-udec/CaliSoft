<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_cases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('proposito');
            $table->text('alcance');
            $table->text('resultado_esperado');
            $table->text('criterios');
            $table->enum('prioridad', ['alta', 'media', 'baja']);
            $table->timestamp('limite');
            $table->text('formulario');
            $table->text('observacion');
            $table->enum('estado', ['evaluar', 'carga', 'terminado']);
            $table->integer('entrega');
            $table->integer('project_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_cases');
    }
}
