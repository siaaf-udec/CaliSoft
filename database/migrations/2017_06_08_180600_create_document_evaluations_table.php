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
        Schema::create('TBL_EvaluacionDocumento', function (Blueprint $table) {
            $table->boolean('checked')->default(false);
            $table->text('observacion')->nullable();
            $table->integer('FK_DocumentoId')->unsigned();
            $table->integer('FK_ComponenteId')->unsigned();
            $table->timestamps();

            $table->foreign('FK_ComponenteId')->references('PK_id')->on('TBL_ComponentesDocumento')
                ->onDelete('cascade');

            $table->foreign('FK_DocumentoId')->references('PK_id')->on('TBL_Documentos')
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
        Schema::dropIfExists('TBL_EvaluacionDocumento');
    }
}
