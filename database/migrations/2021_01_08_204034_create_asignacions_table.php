<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAsignacionsTable
 * @version 1 (25/06/2021)
 */
class CreateAsignacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacions', function (Blueprint $table) {
            $table->id();
            $table->integer('n_asignacion');
            $table->unsignedBigInteger('agente_id')->nullable();
            $table->unsignedBigInteger('periodo_id')->nullable();
            $table->unsignedBigInteger('estudio_id')->nullable();
            $table->string('subestudio');
            $table->foreign('agente_id')->references('id')->on('agentes')->onDelete('set null');
            $table->foreign('periodo_id')->references('id')->on('periodos')->onDelete('set null');
            $table->foreign('estudio_id')->references('id')->on('estudios')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignacions');
    }
}
