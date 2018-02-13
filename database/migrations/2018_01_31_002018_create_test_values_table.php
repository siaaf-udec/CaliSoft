<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_TestValues', function (Blueprint $table) {
            $table->increments('PK_id');
            $table->string('valor');
            $table->boolean('valido')->default(false);
            $table->unsignedInteger('FK_InputType')->nullable();
            $table->enum('tipo', ['xss', 'sql'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TBL_TestValues');
    }
}
