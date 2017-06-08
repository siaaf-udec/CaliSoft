<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->boolean('approved')->nullable();
            $table->text('observacion')->nullable();
            $table->integer('test_id')->unsigned();
            $table->timestamps();

            $table->foreign('test_id')->references('id')->on('tests')
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
        Schema::dropIfExists('test_deliveries');
    }
}
