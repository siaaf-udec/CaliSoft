<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('load_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users');
            $table->string('url');
            $table->integer('test_case_id')->unsigned();
            $table->timestamps();

            $table->foreign('test_case_id')->references('id')->on('test_cases')
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
        Schema::dropIfExists('load_tests');
    }
}
