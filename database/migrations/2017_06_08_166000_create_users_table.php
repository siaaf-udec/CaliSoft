<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Usuarios', function (Blueprint $table) {
            $table->increments('PK_id');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('state', ['active', 'request', 'disabled'])->default('disabled');
            $table->enum('role', ['admin', 'student', 'evaluator'])->defualt('student');
            $table->integer('FK_ProyectoId')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('FK_ProyectoId')->references('id')->on('TBL_Proyectos');
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
