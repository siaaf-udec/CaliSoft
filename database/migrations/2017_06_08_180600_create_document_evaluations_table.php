<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('checked');
            $table->text('observacion');
            $table->integer('document_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('document_id')->references('id')->on('documents')
                ->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_evaluations');
    }
}
