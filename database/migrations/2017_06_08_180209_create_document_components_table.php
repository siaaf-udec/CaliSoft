<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_components', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('required');
            $table->text('description');
            $table->integer('document_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('document_type_id')->references('id')
                ->on('document_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_components');
    }
}
