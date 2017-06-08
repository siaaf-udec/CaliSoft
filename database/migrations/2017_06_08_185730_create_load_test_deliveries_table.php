<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadTestDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('load_test_deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->boolean('approved')->nullable();
            $table->text('observacion')->nullable();
            $table->text('tiempos');
            $table->integer('load_test_id')->unsigned();
            $table->timestamps();

            $table->foreign('load_test_id')->references('id')->on('load_tests')
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
        Schema::dropIfExists('load_test_deliveries');
    }
}
