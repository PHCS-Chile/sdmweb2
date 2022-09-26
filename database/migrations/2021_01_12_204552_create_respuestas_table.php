<?php

use App\Models\Respuesta;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id();
            $table->enum('origen_id', [Respuesta::PH,Respuesta::ICI,Respuesta::CENTRO]);
            $table->string('respuesta_text')->nullable();
            $table->integer('respuesta_int')->nullable();
            $table->text('respuesta_memo')->nullable();
            $table->unsignedBigInteger('atributo_id')->nullable();
            $table->unsignedBigInteger('evaluacion_id')->nullable();
            $table->foreign('atributo_id')->references('id')->on('atributos');
            $table->foreign('evaluacion_id')->references('id')->on('evaluacions');
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
        Schema::dropIfExists('respuestas');
    }
}
