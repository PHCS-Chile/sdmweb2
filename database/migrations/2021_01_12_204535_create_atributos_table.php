<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAtributosTable
 * @version 1
 */
class CreateAtributosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atributos', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('name');
            $table->string('name_interno');
            $table->integer('check_primario')->nullable();
            $table->integer('check_ec')->nullable();
            $table->integer('id_primario')->nullable();
            $table->boolean('no_aplica')->nullable()->default(false);
            $table->string('name_categoria');
            $table->integer('ponderador')->nullable()->default(1);
            $table->float('ponderador_ici')->nullable()->default(1);
            $table->string('tipo_respuesta')->nullable();
            $table->unsignedBigInteger('pauta_id')->nullable();
            $table->foreign('pauta_id')->references('id')->on('pautas')->onDelete('set null');
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
        Schema::dropIfExists('atributos');
    }
}
