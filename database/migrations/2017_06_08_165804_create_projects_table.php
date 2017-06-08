<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('investigation_group_id')->unsigned();
            $table->integer('semillero_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamps();

            $table->foreign('investigation_group_id')->references('id')
                ->on('investigation_groups')->onDelete('cascade');

            $table->foreign('semillero_id')->references('id')
                ->on('semilleros')->onDelete('cascade');

            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
